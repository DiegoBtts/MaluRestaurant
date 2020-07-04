<?php 

  $sale_id = $_GET["id"];

  $link = new \PDO("mysql:host=localhost;dbname=synlab","root","");
  $link->exec("set names utf8");

  $stmt = $link->prepare("SELECT * FROM sales where id = :id");
  $stmt->bindParam(":id",$sale_id,PDO::PARAM_STR);
  $stmt->execute();
  $sales = $stmt->fetch();
  $appointments = json_decode($sales['list_appointment'],true);
  $data = [];

  foreach ($appointments as $key => $value) 
  {
      $stmt = $link->prepare("SELECT * FROM appointment where id = :id");
      $stmt->bindParam(":id",$value["id"],PDO::PARAM_STR);
      $stmt->execute();
      $aux = $stmt->fetch();
      $stmt = null;

      $stmt = $link->prepare("SELECT * FROM groups where id = :id");
      $stmt->bindParam(":id",$aux["exam_id"],PDO::PARAM_STR);
      $stmt->execute();
      $aux2 = $stmt->fetch();

      array_push($data, array("exam"=>$aux2["table_name"],
                                "total"=>$aux2["price"]));
  }

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body{
            margin-bottom: 5px;
            font-family: Arial, Helvetica, sans-serif;
        }
        * {
            font-size: 12px;
            /*font-family: 'Times New Roman';*/
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.producto,
        th.producto {
            width: 100px !important;
            max-width: 100px;
        }

        td.total,
        th.total {
            width: 60px !important;
            max-width: 60px;
            word-break: break-all;
        }

        .centrado {
            text-align: center;
            align-content: center;
            text-transform: uppercase;
        }

        td.item {
            text-align: right;
        }

        .centrado {
            text-align: center;
            align-content: center;
            text-transform: uppercase;
        }

        .ticket {
            width: 160px;
            max-width: 160px;
            align-items: center;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print{
            .oculto-impresion, .oculto-impresion *{
                display: none !important;
            }
        }

        .bold{
            font-weight: bolder;
            font-size: 1.3em;
        }

        .text-center
        {
          align-items: center;
          text-align: center;
        }

    </style>
</head>

<body>

  <div class="ticket">

    <header  style="width: 100%">

      <img src="../mpdf/resultados/example.png" alt="nooo" style="width: 50%; margin-left: 30%;">

      <div class="text-center" style=" margin-left: 2%;">
          <h3>SynLab</h3>
          <br>
      </div>

    </header>

    <div style="width: 100%">

      <p class="centrado">TICKET DE VENTA #<?= $sales["id"] ?>

      <br><?= $sales["created_at"] ?></p>

      <table style="width: 100%">

        <thead>
          <tr>
            <th class="producto">Exam</th>
            <th class="total">$$</th>
          </tr>
        </thead>
        <tbody>

        <?php  foreach($data as $prod): ?>
          <tr style="width: 100%">
            <td class="producto"><?= $prod["exam"] ?></td>
            <td class="total">$<?= $prod["total"] ?></td>
          </tr>
        <?php endforeach; ?>

        <tr style="width: 100%">
          <td class="cantidad"></td>
          <td class="producto" colspan="2">TOTAL</td>
          <td class="total">$<?= $sales["total"] ?></td>
        </tr>

        </tbody>

      </table>

      <div class="text-center">Gracias por su preferencia</div>

    </div>
    
  </div>
</body>

</html>