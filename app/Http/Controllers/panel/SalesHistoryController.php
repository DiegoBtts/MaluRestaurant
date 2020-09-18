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
use Carbon\Carbon;

class SalesHistoryController extends Controller
{
    public function index()
	{
        $total =0;
        $date = strftime("%Y-%m-%d");
        $sales = SaleModel::all();
        foreach($sales as $s){
          $total =$total +$s->total;  
        }
        
		return view('panel.saleshistory.index', ['items' => $sales,'total'=>$total,'fecha'=>$date]);
	}
}