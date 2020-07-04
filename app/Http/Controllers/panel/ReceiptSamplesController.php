<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\AppointmentModel;
use App\models\ReceiptSamplesModel;
use App\models\ClientModel;
use App\Http\Controllers\Controller;
use Endroid\QrCode\QrCode;
use App\models\GroupsModel;
use App\models\TestTypeModel;
use App\models\SamplesTypeModel;
use App\Helpers\Helper;
use App\models\ProductsModel;

class ReceiptSamplesController extends Controller
{
    public function index()
	{
       $items = ReceiptSamplesModel::all();
        return view('panel.receiptsamples.index')->with(["items"=>$items]);
	}

	public function add($id = null) 
	{
        $receiptsamples = new ReceiptSamplesModel();
        $citas = $id!=null?AppointmentModel::find($id):AppointmentModel::where("index","=","0")->get();
        $flag = $id!=null?true:false;

        if (!$flag)
        {
            if (count($citas)==0)
            {
                session()->flash('messages', 'info|No hay citas pendientes de muestra' );
                return redirect()->route('receiptsamples');
            }
        }
        return view('panel.receiptsamples.form')->with(["receiptsamples" => $receiptsamples, "citas" => $citas, "flag" => $flag]);
    }

    public function delete($id)
    {
        $item = ReceiptSamplesModel::find($id);
        $appointment = AppointmentModel::find($item->appointment_id);

        if ($appointment->index>=2) 
        {
            session()->flash('messages', 'warning|La muestra ya se proceso no se puede eliminar' );
            return redirect()->route('receiptsamples');
        } 
        
        $appointment->index = 0;
        $appointment->save();
                
        ReceiptSamplesModel::destroy($id);
        session()->flash('messages', 'success|La muestra se cancelo satisfactoriamente.' );
        return redirect()->route('receiptsamples');
    }

    public function save(Request $request, ReceiptSamplesModel $receiptsamples) 
    {
        if($request->input("product_id") != null)
        {
            $product_id = $request->input("product_id");
            $product = ProductsModel::find($product_id);
            $product->stock = $product->stock-1;
            $product->save();
            $receiptsamples->product_id = $product_id;
        }
        
        $receiptsamples->appointment_id = $request->input('appointment_id');
        $receiptsamples->receiptsamplesdate = $request->input('receiptsamplesdate');
        $receiptsamples->hour = $request->input('hour');


        $array = Helper::generateAppointmentArray($receiptsamples->appointment_id);

        $qrCode = new QrCode("Genero:" . $array[2]->gender . "\n Edad:" .  $array[2]->age . "\n Prueba:" . $array[3]->name . "\n Muestra:" . $array[4]->name );
        $qrCode->setSize(100);

        $receiptsamples->code =$qrCode->writeDataUri();
        $receiptsamples->save();

        $appointment = AppointmentModel::find($receiptsamples->appointment_id);
        $appointment->index = 1;
        $appointment->save();
        
        session()->flash('messages', 'success|Muestra recibida correctamente.' );
        return redirect()->route('receiptsamples');
    }

    public function seeSampleDates($id)
    {
        $appointment = AppointmentModel::find($id);
        $array = \App\Helpers\Helper::generateAppointmentArray($appointment->id);
        return response()->json($array[4]);
    }

    public function showReceiptTable()
    {
        $res = [ "data" => []];

        $items = ReceiptSamplesModel::all()->sortByDesc('id');

        foreach($items as $key => $value) 
        {   
            $appointment_single = Helper::generateAppointmentArray($value->appointment_id);

            $buttons="<div class='btn-group'>";

            if ($appointment_single[0]->index < 2 && \Auth::user()->role == "admin")
            {
               $buttons.= "<a href='".route('exam.add',$value->appointment_id)."' class='btn btn-info' title='Aplicar test'><i class='fa fa-folder'></i></a>";
            }

            $buttons.="
            <button class='btn btn-primary printCode' code='".$value->code."' title='Imprimir codigo'>
                <i class='fa fa-barcode'></i></button>
                <button class='btn btn-danger delete' ReceiptSamplesId='".$value->id."' title='cancelar muestra'>
                <i class='fa fa-times'></i></button>
            </div>"; 

            $img = "<img src='".$value->code."'>";
            array_push($res["data"],[
                (count($items)-($key+1)+1),
                $appointment_single[2]->name,
                $appointment_single[1]->table_name,
                $appointment_single[4]->name,
                $value->receiptsamplesdate,
                $value->hour,
                $img,
                $buttons
            ]);
        }
        return response()->json($res);
    }
}
