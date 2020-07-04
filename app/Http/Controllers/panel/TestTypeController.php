<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\TestTypeModel;
use App\Http\Controllers\Controller;

class TestTypeController extends Controller
{
    public function index()
	{
		return view('panel.testtype.index', ['items' => TestTypeModel::all()]);
	}

	public function add() 
	{
        return view('panel.testtype.form')->with([ 'testtype' => new TestTypeModel() ]);
    }

    public function edit($id)
    {
        $testtype = TestTypeModel::find($id);
        return view('panel.testtype.form')->with(['testtype' => $testtype]);
    }

    public function delete($id)
    {
        TestTypeModel::destroy($id);
        session()->flash('messages', 'success|El tipo de prueba se borro satisfactoriamente.' );
        return redirect()->route('testtype');
    }

    public function save(Request $request, TestTypeModel $testtype) 
    {
    	$validatedData = $request->validate([
            'name' => 'required',
        ]);
        $testtype->name = $request->input('name');
        $testtype->description = $request->input('description');
        $testtype->sample_id = $request->input('sample_id');
        $testtype->save();
        session()->flash('messages', 'success|Cambios guardados correctamente.' );
        return redirect()->route('testtype');
    }
}