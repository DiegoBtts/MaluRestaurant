<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\ExamModel;
use App\Http\Controllers\Controller;
use App\models\AppointmentModel;
use App\models\GroupsModel;
use Illuminate\Support\Facades\DB;
use App\models\UserModel;

class ExamController extends Controller
{
    public function index($id)
	{
        $groups = GroupsModel::find($id);
        if (!$groups)
        {
            session()->flash('messages', 'warning|No hay grupos registrados' );
            return redirect()->back();
        }
		return view('panel.exam.index')->with(["groups"=>$groups]);
	}

    public function delete($exam_id,$group_id)
    {
        $group = GroupsModel::find($group_id);
        $exam = DB::table($group->table_name)->where('id', $exam_id)->get();
        $result = json_decode($exam, true);
        $appointment = AppointmentModel::find($exam[0]->appointment_id);
        $appointment->index = 1;
        $appointment->save();
        DB::table($group->table_name)->where('id', '=', $exam_id)->delete();
        session()->flash('messages', 'success|Se borro el registro' );
        return redirect()->back();
    }

	public function add($id) 
	{
        $appointment = AppointmentModel::find($id);
        return view('panel.exam.form')->with(["appointment"=>$appointment]);
    }

    public function edit($id)
    {
        return view('panel.exam.form');
    }

    public function save(Request $request, AppointmentModel $appointment) 
    {
        $user = UserModel::where("username","=",session("username"))->get();
        $group = GroupsModel::find($appointment->exam_id);
        $arrayQuery = [];
        array_push($arrayQuery, ["appointment_id"=>$appointment->id]);
        array_push($arrayQuery, ["user_id" => $user[0]->id]);
        foreach ($request->input() as $key => $value)
        {
            if ($key!="_token")
            {
                array_push($arrayQuery, [$key => $value]);
            }
        }
        DB::table($group->table_name)
        ->updateOrInsert(call_user_func_array('array_merge', $arrayQuery));

        $appointment->index = 2;
        $appointment->save();
            
        session()->flash('messages', 'success|Cambios guardados correctamente.' );
        return redirect()->route('exam',$appointment->exam_id);
    }
}
