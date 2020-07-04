<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\SellModel;
use App\models\AppointmentModel;
use App\Http\Controllers\Controller;
use App\models\GroupsModel;
use App\models\TestTypeModel;
use App\models\SaleModel;

class SellController extends Controller
{
    public function index()
	{     
		return view('panel.sell.index')->with(['appointment' => new AppointmentModel()]);
	}

    public function save(Request $request) 
    {
        $sale = new SaleModel();
        $list_appointment = json_decode($request->input("listAppointment"),true);

        foreach ($list_appointment as $key => $value) 
        {
            $appointment = AppointmentModel::find($value["id"]);
            $appointment->status = 1;
            $appointment->save();
        }

        $sale->total = $request->input("total");
        $sale->payment_method = $request->input("payment_method");
        $sale->list_appointment = $request->input("listAppointment");
        $sale->save();
        return response()->json($sale->id);
    }

	//este fue el nuevo metodo que implemente
    public function search(Request $request) 
    {
        $res = [];
    	$code = $request->input("code");
    	$appointment  = AppointmentModel::where("appointment_code","=",$code)->get();
        if (count($appointment)!=0)
        {       
            $group = GroupsModel::find($appointment[0]["exam_id"]);
            $test = TestTypeModel::find($group->typeTest_id);
            array_push($res, $appointment[0]["appointment_code"]);
            array_push($res, $group->price);
            array_push($res, $test->description);
            array_push($res, $appointment[0]["id"]);
        }
        return response()->json($res);
    }
}