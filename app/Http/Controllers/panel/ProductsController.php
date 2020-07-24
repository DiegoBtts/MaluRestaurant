<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
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
        $product->price = $request->input('price');
        $product->save();
        session()->flash('messages', 'success|Producto guardado correctamente.' );
        return redirect()->route('product');
    }
}