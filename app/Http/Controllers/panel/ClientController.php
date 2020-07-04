<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\ClientModel;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
	{
		return view('panel.client.index', ['items' => ClientModel::all()
		]);
	}

	public function add() 
	{
        $action ="Agregar";
        return view('panel.client.form',  compact('action'),[
            'client' => new ClientModel(),
        ]);
    }

    public function edit($id)
    {
        $action ="Editar";
        $client = ClientModel::find($id);
        return view('panel.client.form')->with(['client' => $client,'action' => $action]);
    }

    public function delete($id)
    {
        ClientModel::destroy($id);
        session()->flash('messages', 'success|El cliente se borro satisfactoriamente.' );
        return redirect()->route('client');
    }

    public function save(Request $request, ClientModel $client) 
    {
    	$validatedData = $request->validate([
            'name' => 'required',
        ]);
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->age = $request->input('age');
        $client->gender = $request->input('gender');
        $client->save();
        session()->flash('messages', 'success|Cambios guardados correctamente.' );
        return redirect()->route('client');
    }
}
