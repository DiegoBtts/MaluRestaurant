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
		return view('panel.sell.index')->with(['orderfood' => new OrderFoodModel(),'products' =>ProductsModel::all()]);
	}
    public function sale($id)
    {
        $products = ProductsModel::all();
        return view('panel.sell.index')->with(['orderfood' => OrderFoodModel::find($id),'products' =>$products]);
    }
    public function save(Request $request) 
    {
        $res = array();
        
        $orderfood = OrderFoodModel::find($request->comanda);
        $orderfood->status = 1;
        $orderfood->save();
        
        $sale = new SaleModel();
        $sale->total = $request->total;
        $sale->payment_method = $request->options;
        $sale->orderfood = $request->comanda;
        $sale->save();
        
        array_push($res,["total"=>$request->total,"pago"=>$request->pago,"cambio"=>($request->pago-$request->total)]);  
        
        
        return ($res);
    }

	//este fue el nuevo metodo que implemente
    public function search(Request $request) 
    {
        $productsList=array();
        $quantityList=array();
        $res=array();
        $results = OrderFoodModel::whereIdAndStatus($request->id,0)->get();
        for($i = 0; $i<strlen ( $results[0]->products);$i++){
            if($results[0]->products[$i]!='"' &&$results[0]->products[$i]!='['&& $results[0]->products[$i]!=']' && $results[0]->products[$i]!=','){
              array_push($productsList,$results[0]->products[$i]);   
            }  
        }
        for($i = 0; $i<strlen ( $results[0]->quantity);$i++){
            if($results[0]->quantity[$i]!='"' &&$results[0]->quantity[$i]!='['&& $results[0]->quantity[$i]!=']' && $results[0]->quantity[$i]!=','){
              array_push($quantityList,$results[0]->quantity[$i]);   
            }  
        }
        for($j = 0; $j<sizeof($productsList);$j++){
            $product = ProductsModel::find($productsList[$j]);
            array_push($res,["nombre"=>$product->name,"precio"=>$product->price,"cantidad"=>$quantityList[$j],"product_id"=>$product->id,"orderfood_id"=>$results[0]->id]);
        }
          
        return ($res);
    }
}