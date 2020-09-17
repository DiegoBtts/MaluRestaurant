<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\OrderFoodModel;
use App\models\ProductsModel;
use App\Http\Controllers\Controller;
use App\models\SaleModel;
require __DIR__.'\ticket\autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SellController extends Controller
{
    public function index()
	{     
		return view('panel.sell.index')->with(['sales' => new SaleModel()]);
	}

    public function save(Request $request) 
    {
        $orderfood = OrderFoodModel::find($request->comanda);
        $orderfood->status = 1;
        $orderfood->save();
        
        $sale = new SaleModel();
        $sale->total = $request->totalSales;
        $sale->payment_method = $request->options;
        $sale->orderfood = $request->comanda;
        $sale->save();
        
        session()->flash('messages', 'success|Gracias por su compra' );
        return redirect()->route('sell');
    }

	//este fue el nuevo metodo que implemente
    public function search(Request $request) 
    {
        $productsList=array();
        $quantityList=array();
        $res=array();
        $results = OrderFoodModel::find($request->id);
        for($i = 0; $i<strlen ( $results->products);$i++){
            if($results->products[$i]!='"' &&$results->products[$i]!='['&& $results->products[$i]!=']' && $results->products[$i]!=','){
              array_push($productsList,$results->products[$i]);   
            }  
        }
        for($i = 0; $i<strlen ( $results->quantity);$i++){
            if($results->quantity[$i]!='"' &&$results->quantity[$i]!='['&& $results->quantity[$i]!=']' && $results->quantity[$i]!=','){
              array_push($quantityList,$results->quantity[$i]);   
            }  
        }
        for($j = 0; $j<sizeof($productsList);$j++){
            $product = ProductsModel::find($productsList[$j]);
            array_push($res,["nombre"=>$product->name,"precio"=>$product->price,"cantidad"=>$quantityList[$j],"product_id"=>$product->id,"orderfood_id"=>$results->id]);
        }
          
        return ($res);
    }

    public function Ticket(){

        
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

        $printer->text("\n"."Restaurante Malu" . "\n");
        $printer->text("Direccion: Calle 11 Av J." . "\n");
        $printer->text("Tel: 6343460278" . "\n");
        #La fecha también
        date_default_timezone_set("America/Hermosillo");
        $printer->text(date("Y-m-d H:i:s") . "\n");
        $printer->text("-----------------------------" . "\n");
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("CANT  DESCRIPCION    P.U   IMP.\n");
        $printer->text("-----------------------------"."\n");
            /*
	            Ahora vamos a imprimir los
	            productos
            */
	/*Alinear a la izquierda para la cantidad y el nombre*/
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Productos\nTaco de Asada\n");
        $printer->text( "2  pieza    25.00 50.00   \n");
        $printer->text("Taco de Camaron \n");
        $printer->text( "3  pieza    25.00 75.00   \n");
        $printer->text("Parrillada \n");
        $printer->text( "5  pieza    120.00 600.00   \n");
        /*
            Terminamos de imprimir
            los productos, ahora va el total
        */
        $printer->text("-----------------------------"."\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("SUBTOTAL: $709.00\n");
        $printer->text("IVA: $16.00\n");
        $printer->text("TOTAL: $725.00\n");
    

        /*
            Podemos poner también un pie de página
        */
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Muchas gracias por su compra\n");



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
        return redirect()->route('sell');
    }
}