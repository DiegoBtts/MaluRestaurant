<?php 

namespace App\Helpers;

use App\models\UserModel;
use App\models\OrderFoodModel;
use App\models\SaleModel;
use App\models\ProductsModel;
use Illuminate\Support\Facades\DB;

class helper
{
	//consult Methods
	public static function generateOrderFoodArray($id)
	{
		$res = [];

		$orderfood = OrderFoodModel::find($id);
		array_push($res, $orderfood);
        return $res;
	}

	public static function getOrderFood($ordertype)
	{
		$orderfood = OrderFoodModel::whereStatusAndOrdertype(0,$ordertype)->get();
		return $orderfood;
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