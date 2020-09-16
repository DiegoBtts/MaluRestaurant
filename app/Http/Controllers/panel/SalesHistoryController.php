<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\AppointmentModel;
use App\Http\Controllers\Controller;
use App\models\GroupsModel;
use App\models\TestTypeModel;
use App\models\SaleModel;
use App\models\ClientModel;
use App\Helpers\Helper;

class SalesHistoryController extends Controller
{
    public function index()
	{
        $sales = SaleModel::all();
        
		return view('panel.saleshistory.index', ['items' => $sales]);
	}
    
    public function delete($id)
    {
        if(\Auth::user()->role == "admin"){
            SaleModel::destroy($id);
            session()->flash('messages', 'success|La venta se borro satisfactoriamente.' );
            return redirect()->route('saleshistory');
        }else{
            session()->flash('messages', 'danger|Accion denegada para este tipo de usuario.' );
            return redirect()->route('saleshistory');
        }
    }

    public function showAppointment($id)
    {
        $sale =SaleModel::find($id);
        $appointment_list = json_decode($sale->list_appointment,true);
        $array = [];
        foreach ($appointment_list as $key => $value) 
        {
            $appointment = AppointmentModel::find($value["id"]);
            $group = GroupsModel::find($appointment->exam_id);
            $client = ClientModel::find($appointment->client_id);
            array_push($array, array(["codigo"=>$appointment->appointment_code, "client" => $client->name, "price"=>$group->price]));
        }
        return response()->json($array);
    }
}