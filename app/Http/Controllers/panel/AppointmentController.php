<?php
namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\TestTypeModel;
use App\models\SamplesTypeModel;
use App\models\AppointmentModel;
use App\models\ClientModel;
use App\models\GroupsModel;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\models\ReceiptSamplesModel;

class AppointmentController extends Controller
{
    public function index()
	{
        return view('panel.appointment.index');
    }

	public function add() 
	{
        return view('panel.appointment.form')->with(['appointment' => new AppointmentModel()]);
    }

    public function edit($id)
    {
        $appointment =AppointmentModel::find($id);
        return view('panel.appointment.form')->with(['appointment' => $appointment]);
    }

    public function delete($id)
    {
        AppointmentModel::destroy($id);
        session()->flash('messages', 'success|La cita se cancelo satisfactoriamente.' );
        return redirect()->route('appointment');
    }

    public function save(Request $request, AppointmentModel $appointment) 
    {
        $date = $request->input('date')!=null?$request->input('date'):date('Y-m-d');
        $hour = $request->input('hour')!=null?$request->input('hour'):date('H:i:s');
        $appointment->date = $date;
        $appointment->hour = $hour;
        $appointment->appointment_code = $request->input('appointment_code');
        $appointment->client_id = $request->input('client');
        $appointment->exam_id = $request->input('exam_id');
        $appointment->type = $request->input('type');
        $appointment->code = $request->input('code_encode');
        $appointment->index = 0;
        $appointment->status = 0;
        $appointment->save();

        if($request->input('flag')=="1")
        {
            if ($appointment->type == 1)
            {
                session()->flash('messages', 'success|Cita guardada correctamente.' );
                return redirect()->route('appointment');
            }
            else
            {
                echo "<script>window.location='/receiptsamples/add/".$appointment->id."'</script>";
            } 
        }
        else
        {
            session()->flash('messages', 'success|Cita guardada correctamente.' );
            return redirect()->route('appointment');
        }       
    }

    public function showAppointment($id)
    {
        $appointment =AppointmentModel::find($id);
        $array = [];
        $client = ClientModel::find($appointment->client_id);
        $group = GroupsModel::find($appointment->exam_id);
        $type = $appointment->type=="1"?"Programada":"Inmediata";
        array_push($array, $appointment->appointment_code,$appointment->date, $client->name,$group->table_name,$type);
        return response()->json($array);
    }

    public function showAppointmentTable()
    {
        $res = [ "data" => []];
        $items = AppointmentModel::all();

        foreach($items as $key => $value) 
        {   
            $appointment_single = Helper::generateAppointmentArray($value->id);        

            $buttons="<div class='btn-group'><button class='btn btn-primary btnPrintBarcode' sample='".$appointment_single[4]->name."' barcode='".$value->appointment_code."'><i class='fa fa-barcode' title='Imprimir recibo'></i></button>";   

            $status = $value->status=="1"? "Pagada":"Pendiente";
            $type = $value->type=="1"?"Programada":"Inmediata";
            $validate_receiptsample = ReceiptSamplesModel::where("appointment_id","=",$value->id)->get();

            if (count($validate_receiptsample)==0)
            {
                $buttons.="<button class='btn btn-info btnGetSample' idAppointment = '".$value->id."'><i class='fa fa-folder' title='Recibir muestra'></i></button>";
            }

            switch ($value->index)
            {
                case 0:
                    $index = "Sin muestra";
                    break;                
                case 1:
                    $index = "con muestra s/procesar";
                    break;
                case 2:
                    $index = "Procesada";
                    break;
            }    

            $buttons.="<a href='/appointment/".$value->id."/edit' class='btn btn-warning'><i class='fa fa-eye'></i></a>
                <button class='btn btn-danger btnDeleteItem' idItem = '".$value->id."'><i class='fa fa-times'></i></button>
            </div>";

            array_push($res["data"],[
                (count($items)-($key+1)+1),
                $value["appointment_code"],
                $appointment_single[2]->name,
                $appointment_single[1]->table_name,
                $type,
                $value["date"]." ".$value["hour"],
                $index,
                $status,
                $buttons
            ]);
        }
        return response()->json($res);
    }
    public function CheckDates(Request $value){
        $date2 = $value->input("Dates");
        $hour = $value->input("Hour");
        $compare = $value->input("comparative");
        $date = Helper::conectar()->prepare("Select * from appointment where date = :date AND hour Between :time AND :comparative");
        $date->bindParam(":date",$date2,\PDO::PARAM_STR);
        $date->bindParam(":time",$hour,\PDO::PARAM_STR);
        $date->bindParam(":comparative",$compare,\PDO::PARAM_STR);
        $date->execute();
        return response()->json($date->fetch());
        //dd($value->input("Dates"));//dd es para mostrar como el console
    }
}