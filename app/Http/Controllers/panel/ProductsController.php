<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\CategoryModel;
use App\models\ProductsModel;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
	{
        $products = ProductsModel::all();
		return view('panel.product.index', ['items' => $products]);
	}

	public function add() 
	{
        return view('panel.product.form')->with(['product' => new ProductsModel()]); 
    }

    public function edit($id)
    {
        $product = ProductsModel::find($id);
        return view('panel.product.form')->with(['product' => ProductsModel::find($id)]);
    }

    public function addStock($id)
    {
        $product = ProductsModel::find($id);
        return response()->json($product);
    }

    public function saveStock(Request $request)
    {
        $product = ProductsModel::find($request->input('product_id'));
        if($request->input('flag')=="up")
        {
            $newStock = $request->input("stock") + $product->stock;
        }
        else
        {
            $newStock = $product->stock - $request->input("stock");
        }
        $product->stock = $newStock;
        if($product->save())
        {
            session()->flash('messages', 'success|El stock se actualizo correctamente.' );
        }
        else
        {
            session()->flash('messages', 'error|El stock no se actualizo correctamente.' );
        }
        return redirect()->route('product');
    }

    public function delete($id)
    {
        ProductsModel::destroy($id);
        session()->flash('messages', 'success|El Producto se borro satisfactoriamente.' );
        return redirect()->route('product');
    }

    public function save(Request $request, ProductsModel $product) 
    {
    	$validatedData = $request->validate([
            'name' => 'required',
        ]);
        $product->name = $request->input('name');
        $product->purchase_price = $request->input('purchase_price');
        $product->stock = $request->input('stock');
        $product->stock_min = $request->input('stock_min');
        $product->expiration_date = $request->input('expiration_date');
        $product->categoria_id = $request->input("categoria_id");
        $product->save();
        session()->flash('messages', 'success|Producto guardado correctamente.' );
        return redirect()->route('product');
    }
}
