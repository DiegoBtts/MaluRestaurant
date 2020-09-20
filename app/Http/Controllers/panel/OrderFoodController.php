<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\OrderFoodModel;
use App\models\ProductsModel;
use App\models\ProductsOrderfoodModel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

require __DIR__.'\ticket\autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class OrderFoodController extends Controller
{
    public function index()
	{
        $orderfood = OrderFoodModel::whereStatus(0)->get();
		return view('panel.orderfood.index', ['items' => $orderfood]);
	}

	public function add() 
	{
        $products = ProductsModel::all();
        return view('panel.orderfood.form')->with(['orderfood' => new OrderFoodModel(),'products' =>$products,'res'=>0]); 
    }

    public function edit($id)
    {
        $products = ProductsModel::all();
        $orderfood =OrderFoodModel::find($id);
        $productsList =json_decode($orderfood->products);
        $quantityList=json_decode($orderfood->quantity);
        $res = array();
        for($j = 0; $j<sizeof($productsList);$j++){
            $product = ProductsModel::find($productsList[$j]);
            array_push($res,["nombre"=>$product->name,"precio"=>$product->price,"cantidad"=>$quantityList[$j],"product_id"=>$product->id]);
        }
        return view('panel.orderfood.form')->with(['orderfood' => $orderfood,'products' =>$products,'res'=>$res]);
    }


    public function delete($id)
    {
        OrderFoodModel::destroy($id);
        session()->flash('messages', 'success|La comanda se borro satisfactoriamente.' );
        return redirect()->route('orderfood');
    }

    public function save(Request $request, OrderFoodModel $orderfood ) 
    {
        $date = strftime("%Y-%m-%d");
        $hour = strftime("%H:%M:%S");
        $orderfood->date = $date;
        $orderfood->hour = $hour; 
        $orderfood->ordertype = $request->input('ordertype');
        $orderfood->name = $request->input('name');
        $orderfood->last_name = $request->input('last_name');
        $orderfood->address = $request->input('address');
        $orderfood->phone = $request->input('phone');
        $orderfood->tablenumber = $request->input('tablenumber');
        $orderfood->status = 0;
        $orderfood->products =json_encode($request->input('products'));
        $orderfood->quantity =json_encode(array_values(array_filter($request->input('quantity'))));
        $names = $orderfood;
        $orderfood->save();
        
        
        session()->flash('messages', 'success|Comanda registrada correctamente.' );
        $this->ticketComanda($names);
        return redirect()->route('orderfood');
    }

    
    public function ticketComanda($names){
        
        $nombre_impresora = "POS"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.

$res=array();
 $productsList=json_decode($names->products);
 $quantityList=json_decode($names->quantity);
        
        
        
echo 1;
//echo $names->ordertype;
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
$printer->setTextSize(1,2);
$printer->text("\n"."Comanda" . "\n");
$printer->setTextSize(1,1);
$printer->text("Direccion: Calle 11 Av J." . "\n");
$printer->text("Tel: 6343460278" . "\n");
#La fecha también
date_default_timezone_set("America/Hermosillo");
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");


if($names->ordertype=="restaurante"){
    echo "Entro a restaurante";
    $printer->text("Tipo de Orden: " . $names->ordertype."\n");
    $printer->text("Mesa #: " . $names->tablenumber."\n");
}else if($names->ordertype=="Domicilio"){
    $printer->text("Tipo de Orden: " . $names->ordertype."\n");
    $printer->text("Nombre: " . $names->name." " .$names->last_name."\n");
    $printer->text("Telefono: " . $names->phone."\n");
    $printer->text("Domicilio: " . $names->address."\n");
}
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("CANT  DESCRIPCION      .\n");
$printer->text("-----------------------------"."\n");
/*
	Ahora vamos a imprimir los
	productos
*/
	/*Alinear a la izquierda para la cantidad y el nombre*/
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->setTextSize(1,2);
    $printer->text("Productos:\n");
    $total=0;

    for($i=0; $i<sizeof($productsList); $i++){
        
        
            echo $productsList[$i];
            $arreglo = ProductsModel::whereId($productsList[$i])->get();
            $printer->text($quantityList[$i] ."  ");
            $printer->text($arreglo[0]->name ."\n");
            printf($arreglo[0]->name);
            
        }
    $printer->setTextSize(1,1);
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("-----------------------------"."\n");
;


/*
	Podemos poner también un pie de página
*/




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