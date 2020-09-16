<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\OrderFoodModel;
use App\models\ProductsModel;
use App\Http\Controllers\Controller;
use App\models\SaleModel;

class SellController extends Controller
{
    public function index()
	{     
		return view('panel.sell.index')->with(['sales' => new SaleModel()]);
	}

    public function save(Request $request) 
    {
        $orderfood = OrderFoodModel::find($request->comanda);
        $orderfood->status = 1;
        $orderfood->save();
        
        $sale = new SaleModel();
        $sale->total = $request->totalSales;
        $sale->payment_method = $request->options;
        $sale->orderfood = $request->comanda;
        $sale->save();
        
        session()->flash('messages', 'success|Gracias por su compra' );
        return redirect()->route('sell');
    }

	//este fue el nuevo metodo que implemente
    public function search(Request $request) 
    {
        $productsList=array();
        $quantityList=array();
        $res=array();
        $results = OrderFoodModel::find($request->id);
        for($i = 0; $i<strlen ( $results->products);$i++){
            if($results->products[$i]!='"' &&$results->products[$i]!='['&& $results->products[$i]!=']' && $results->products[$i]!=','){
              array_push($productsList,$results->products[$i]);   
            }  
        }
        for($i = 0; $i<strlen ( $results->quantity);$i++){
            if($results->quantity[$i]!='"' &&$results->quantity[$i]!='['&& $results->quantity[$i]!=']' && $results->quantity[$i]!=','){
              array_push($quantityList,$results->quantity[$i]);   
            }  
        }
        for($j = 0; $j<sizeof($productsList);$j++){
            $product = ProductsModel::find($productsList[$j]);
            array_push($res,["nombre"=>$product->name,"precio"=>$product->price,"cantidad"=>$quantityList[$j],"product_id"=>$product->id,"orderfood_id"=>$results->id]);
        }
          
        return ($res);
    }
}