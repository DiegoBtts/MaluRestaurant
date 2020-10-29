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

require __DIR__.'\ticket\autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SalesHistoryController extends Controller
{
    public function index()
	{
        $total =0;
        $date = strftime("%Y-%m-%d");
        $sales = SaleModel::where('created_at','like','%'.$date.'%')->get();
        foreach($sales as $s){
          $total =$total +$s->total;  
        }
        
    return view('panel.saleshistory.index', ['items' => $sales,'total'=>$total,'fecha'=>$date]);
    
  }
  
  public function ticket(Request $request){
	  $total =0;
      $date = strftime("%Y-%m-%d");
      $sales = SaleModel::where('created_at','like','%'.$date.'%')->get();
        foreach($sales as $s){
          $total =$total +$s->total;  
        }
        
        $nombre_impresora = "POS"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
echo 1;
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/

/*
	Ahora vamos a imprimir un encabezado
*/
$printer->setTextSize(2,2);
$printer->text("\n"."Restaurante Malu" . "\n");
$printer->setTextSize(1,1);
$printer->text("Direccion: Calle 11 Av J." . "\n");
$printer->text("Tel: 6343460278" . "\n");
#La fecha también
date_default_timezone_set("America/Hermosillo");
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");
$printer->setTextSize(2,1);
$printer->text("~~CORTE FIN DIA~~.\n");
$printer->setTextSize(1,1);
$printer->text("-----------------------------"."\n");
/*
	Ahora vamos a imprimir los
	productos
*/
	/*Alinear a la izquierda para la cantidad y el nombre*/
$printer->setTextSize(2,1);
    $printer->text("$". $request['total']."\n\n");
    $printer->setTextSize(1,1);

/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("-----------------------------"."\n");
        $printer->setTextSize(2,1);
		$printer->text("~~Ventas del Día~~.\n");
		$printer->setTextSize(1,1);
		$printer->text("\n# venta   Total\n");
		foreach($sales as $clave => $sale){
          $printer->text($sale['id']."        $".$sale['total']."\n");
        }


/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("-----------------------------"."\n");
$printer->text("Exito Equipo....\n");



/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

        
    }
}