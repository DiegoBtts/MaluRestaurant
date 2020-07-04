<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\SamplesTypeModel;
use App\Http\Controllers\Controller;

class SamplesTypeController extends Controller
{
    public function index()
	{
		return view('panel.samplestype.index', ['items' => SamplesTypeModel::all()
		]);
	}

	public function add() 
	{
        $action ="Agregar";
        return view('panel.samplestype.form',compact('action'), [
            'samplestype' => new SamplesTypeModel(),
        ]);
    }

    public function edit($id)
    {
        $action ="Editar";
        $samplestype = SamplesTypeModel::find($id);
        return view('panel.samplestype.form')->with(['samplestype' => $samplestype,'action' => $action]);
    }

    public function delete($id)
    {
        SamplesTypeModel::destroy($id);
        session()->flash('messages', 'success|El tipo de muestra se borro satisfactoriamente.' );
        return redirect()->route('samplestype');
    }

    public function save(Request $request, SamplesTypeModel $samplestype) 
    {
    	$validatedData = $request->validate([
            'name' => 'required',
        ]);
        $samplestype->name = $request->input('name');
        $samplestype->description = $request->input('description');
       
        $samplestype->save();
        session()->flash('messages', 'success|Cambios guardados correctamente.' );
        return redirect()->route('samplestype');
    }
}