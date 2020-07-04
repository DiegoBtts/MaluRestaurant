<?php 

class Plantilla
{
	public function getPlantilla($table_name,$id_exam)
	{
		$exam = Plantilla::Select($table_name,"id",$id_exam);
		$user = Plantilla::Select("users","id",$exam["user_id"]);
		$appointment = Plantilla::Select("appointment","id",$exam["appointment_id"]);
		$client = Plantilla::Select("client","id",$appointment["client_id"]);
		$client_name = $client["name"]." ".$client["lastname"];
		$plantilla='
		<div style="width: 100%">

			<table style="width: 100%;">
				<tr>
					<td>
						<img src="example.png" alt="" style="width: 15%">
					</td>
					<td>
						<h1>SynLab impresión demo</h1>
					</td>
				</tr>
			</table>

			<table style="width: 100%; text-align: left; border: #b2b2b2 1px solid;border-collapse: collapse;">
				<tr>
					<th>Dr: </th>
					<td>'.$user["name"].'</td>
				</tr>
				<tr>
					<th>Paciente: </th>
					<td>'.$client_name.'</td>
				</tr>
				<tr>
					<th>Tipo de prueba: </th>
					<td>'.str_replace("_"," ", ucwords($table_name)).'</td>
				</tr>
				<tr>
					<th>Fecha de realizacion: </th>
					<td>'.$exam["create_at"].'</td>
				</tr>
			</table>
			<div style="text-align:center"><h2>Resultados</h2></div>';

		unset($exam["id"]);
		unset($exam["appointment_id"]);
		unset($exam["user_id"]);
		unset($exam["create_at"]);

		$plantilla.= '<table style="width: 100%; text-align: left; border: #b2b2b2 1px solid;border-collapse: collapse;">';

		foreach ($exam as $key => $value)
		{
			$plantilla.="<tr>
				<th>".$key."</th>
				<td>".$value[$key]."</td>
			</tr>";
		}

		$plantilla.="</table>

		<div style='text-align:center; width: 100%'>
		<p><h4><b>Gracias por su preferencia</b></h4></p>
		</div>
		</div>";

		return $plantilla;
	}

	public static function Select($table,$item,$value)
	{
		$stmt = Plantilla::conectar()->prepare("SELECT * FROM $table where $item = :$item");
		$stmt->bindParam(":".$item,$value,PDO::PARAM_STR);
		$stmt->execute();
		$timetables = array();
		while ( $item= $stmt->fetch(PDO::FETCH_ASSOC) ) {
		    $timetables[]=$item;
		} 
		return $timetables[0];
	}

	static public function Conectar()
	{
		$link = new \PDO("mysql:host=localhost;dbname=synlab","root","");
		$link->exec("set names utf8");
		return $link;
	}
}
