<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\InvoicesModel;
use App\models\SaleModel;
use Mail;
use App\Mail\invoicesMessage;
use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    public function index()
	{
        $invoices = InvoicesModel::all();
        
		return view('panel.invoices.index', ['items' => $invoices]);
	}

	public function add() 
	{
        $sales = SaleModel::all();
        return view('panel.invoices.form')->with(['invoices' => new InvoicesModel(),'sales'=>$sales]); 
    }

    public function edit($id)
    {
        $sales = SaleModel::all();
        return view('panel.invoices.form')->with(['invoices' => InvoicesModel::find($id),'sales'=>$sales]);
    }


    public function delete($id)
    {
        InvoicesModel::destroy($id);
        session()->flash('messages', 'success|La factura se borro satisfactoriamente.' );
        return redirect()->route('invoices');
    }

    public function save(Request $request, InvoicesModel $invoices) 
    {
    	$validatedData = $request->validate([
            'RFC' => 'required',
        ]);
        $invoices->RFC = $request->input('RFC');
        $invoices->business_name = $request->input('business_name');
        $invoices->state = $request->input('state');
        $invoices->citie = $request->input('citie');
        $invoices->address = $request->input('address');
        $invoices->CP = $request->input('CP');
        $invoices->phone = $request->input('phone');
        $invoices->sales= SaleModel::find($request->sales)->total;
        $invoices->email = $request->input('email');
        
        $invoices->save();
        
        Mail::to('yanitza.guadalupe@gmail.com')->send(new invoicesMessage($invoices));
        
        session()->flash('messages', 'success|Factura enviada correctamente.' );
        return redirect()->route('invoices');

    }
}