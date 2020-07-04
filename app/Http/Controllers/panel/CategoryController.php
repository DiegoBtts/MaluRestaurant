<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\CategoryModel;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
	{
		return view('panel.category.index', ['items' => CategoryModel::all()
		]);
	}

	public function add() 
	{
        $action ="Agregar";
        return view('panel.category.form',  compact('action'),[
            'category' => new CategoryModel(),
        ]);
    }

    public function edit($id)
    {
        $action ="Editar";
        $category = CategoryModel::find($id);
        return view('panel.category.form')->with(['category' => $category,'action' => $action]);
    }

    public function delete($id)
    {
        CategoryModel::destroy($id);
        session()->flash('messages', 'success|El cliente se borro satisfactoriamente.' );
        return redirect()->route('category');
    }

    public function save(Request $request, CategoryModel $category) 
    {
    	$validatedData = $request->validate([
            'name' => 'required',
        ]);
        $category->name = $request->input('name');
        $category->save();
        session()->flash('messages', 'success|Cambios guardados correctamente.' );
        return redirect()->route('category');
    }
}
