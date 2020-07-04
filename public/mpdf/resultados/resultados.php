<?php 
require_once "../../vendor/autoload.php";
require_once "plantilla.php";
// error_reporting(0);

class imprimirContrato
{
	public $table_name;
	public $id_exam;

	public function traerContrato()
	{
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
		$plantilla = Plantilla::getPlantilla($this->table_name,$this->id_exam);
		$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
	}
}

$contrato = new imprimirContrato();
$contrato -> table_name = $_GET["table_name"];
$contrato -> id_exam = $_GET["id_exam"];
$contrato -> traerContrato();

?>