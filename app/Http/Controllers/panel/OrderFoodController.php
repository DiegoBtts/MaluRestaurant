<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\OrderFoodModel;
use App\models\ProductsModel;
use App\models\ProductsOrderfoodModel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OrderFoodController extends Controller
{
    public function index()
	{
        $orderfood = OrderFoodModel::whereStatus(0)->get();
		return view('panel.orderfood.index', ['items' => $orderfood]);
	}

	public function add() 
	{
        $products = ProductsModel::all();
        return view('panel.orderfood.form')->with(['orderfood' => new OrderFoodModel(),'products' =>$products]); 
    }

    public function edit($id)
    {
        $products = ProductsModel::all();
        return view('panel.orderfood.form')->with(['orderfood' => OrderFoodModel::find($id),'products' =>$products]);
    }


    public function delete($id)
    {
        OrderFoodModel::destroy($id);
        session()->flash('messages', 'success|La comanda se borro satisfactoriamente.' );
        return redirect()->route('orderfood');
    }

    public function save(Request $request, OrderFoodModel $orderfood ) 
    {
        $date = strftime("%Y-%m-%d");
        $hour = strftime("%H:%M:%S");
        $orderfood->date = $date;
        $orderfood->hour = $hour; 
        $orderfood->ordertype = $request->input('ordertype');
        $orderfood->name = $request->input('name');
        $orderfood->last_name = $request->input('last_name');
        $orderfood->address = $request->input('address');
        $orderfood->phone = $request->input('phone');
        $orderfood->tablenumber = $request->input('tablenumber');
        $orderfood->status = 0;
        $orderfood->products =json_encode($request->input('products'));
        $orderfood->quantity =json_encode(array_values(array_filter($request->input('quantity'))));
        
        $orderfood->save();
        
        session()->flash('messages', 'success|Comanda registrada correctamente.' );
        return redirect()->route('orderfood');
    }
}