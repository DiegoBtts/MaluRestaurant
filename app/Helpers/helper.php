<?php 

namespace App\Helpers;

use App\models\SamplesTypeModel;
use App\models\CategoryModel;
use App\models\TestTypeModel;
use App\models\UserModel;
use App\models\GroupsModel;
use App\models\ClientModel;
use App\models\AppointmentModel;
use App\models\SaleModel;
use App\models\ProductsModel;
use Illuminate\Support\Facades\DB;

class helper
{
	//consult Methods
	public static function generateAppointmentArray($id)
	{
		$res = [];

		$appointment = AppointmentModel::find($id);
		array_push($res, $appointment);
		$group = GroupsModel::find($appointment->exam_id);
		array_push($res, $group);
		$client =ClientModel::find($appointment->client_id);
		array_push($res, $client);
        $testtype =TestTypeModel::find($group->typeTest_id);
        array_push($res, $testtype);
        $samplestype =SamplesTypeModel::find($testtype->sample_id);
        array_push($res, $samplestype);
        return $res;
	}

	public static function getAppointment($id)
	{
		if ($id!=0)
		{
			return AppointmentModel::find($id);
		}
		else
		{
			return AppointmentModel::all();
		}
	}

	public static function getSale($id)
	{
		if ($id!=0)
		{
			return SaleModel::find($id);
		}
		else
		{
			return SaleModel::all();
		}
	}

	public static function getSample($id)
	{
		if ($id!=0)
		{
			return SamplesTypeModel::find($id);
		}
		else
		{
			return SamplesTypeModel::all();
		}
	}

	public static function getClient($id)
	{
		if ($id!=0)
		{
			return ClientModel::find($id);
		}
		else
		{
			return ClientModel::all();
		}
	}

	public static function getExam($id)
	{
		if ($id!=0)
		{
			return GroupsModel::find($id);
		}
		else
		{
			return GroupsModel::all();
		}
	}

	public static function getCategories($id)
	{
		if ($id!=0)
		{
			return CategoryModel::find($id);
		}
		else
		{
			return CategoryModel::all();
		}
	}

	public static function getTest($id)
	{
		if ($id!=0)
		{
			return TestTypeModel::find($id);
		}
		else
		{
			return TestTypeModel::all();
		}
	}

	public static function getUsers($id)
	{
		if ($id!=0)
		{
			return UserModel::find($id);
		}
		else
		{
			return UserModel::all();
		}
	}

	public static function getProducts($id)
	{
		if ($id!=0)
		{
			return ProductsModel::find($id);
		}
		else
		{
			return ProductsModel::where("stock",">",0)->get();
		}
	}

	//dynamic Methods

	static public function Conectar()
	{
		$link = new \PDO("mysql:host=localhost;dbname=synlab","root","");
		$link->exec("set names utf8");
		return $link;
	}

	public static function createDataTable($table_name)
	{
		$stmt = helper::conectar()->prepare("SELECT * FROM $table_name");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}

	public static function createHeaderTable($table_name)
	{
		$stmt = helper::conectar()->prepare("DESCRIBE $table_name");
		$stmt->execute();
		$table_fields = $stmt->fetchAll(\PDO::FETCH_COLUMN);
		return $table_fields;
	}

	public static function CreateTable($sql)
	{
	    $stmt = helper::conectar()->prepare($sql);
	    $result = $stmt->execute();
	    if ($result)
	    {
	    	return true;
	    }
	    else
	    {
	    	return false;
	    }
	}

	public static function TableQueryBuilder($table_name,$field_name,$field_type)
    {
        $query = "CREATE TABLE ".$table_name."(id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, appointment_id bigint(20) unsigned,
        	user_id bigint(20) unsigned,";

        foreach ($field_name as $key => $value)
        {
            $query.= strtolower(str_replace(" ","_",$value))." ".$field_type[$key]."(150) null,";         
        }

        $query.=" create_at TIMESTAMP,FOREIGN KEY (appointment_id) REFERENCES appointment(id) ON DELETE CASCADE)";
        return $query;
    }
}