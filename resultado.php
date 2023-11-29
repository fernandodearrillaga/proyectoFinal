
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la búsqueda</title>
</head>
<header>
        <?php require_once('header.php');?>
    </header>
    <div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
<h1 class="p-4">Resultados de la búsqueda</h1>
</div>
</div>
<?php
//echo "resultado";
//var_dump($_POST);
//SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='ZARAGOZA') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='BARCELONA') AND (`parada`='ZARAGOZA' OR `parada`='BARCELONA' );
//SELECT *, MIN(hora), MAX(hora) FROM `paradas` WHERE (`id_ruta`=1 OR `id_ruta`=2) AND (`parada`='ZARAGOZA' or `parada`='BARCELONA') group BY(`id_ruta`)
//SELECT *, MIN(`hora`), MAX(`hora`) FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='ZARAGOZA') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='BARCELONA') AND (`parada`='ZARAGOZA' OR `parada`='BARCELONA' ) GROUP BY(`id_ruta`)
//SELECT * FROM `paradas` WHERE `hora`>(SELECT `hora` FROM `paradas` WHERE `id`=13)
//SELECT P1.*, P2.* FROM `paradas`  P1, `paradas`  P2  WHERE P1.id_ruta=P2.id_ruta AND p1.hora<p2.hora AND p1.parada='ZARAGOZA' and p2.parada='MADRID';
//SELECT ORIGEN.*, DESTINO.* FROM `paradas`  ORIGEN, `paradas`  DESTINO  WHERE ORIGEN.id_ruta=DESTINO.id_ruta AND ORIGEN.hora<DESTINO.hora AND ORIGEN.parada='ZARAGOZA' AND DESTINO.parada='MADRID';
//SELECT ORIGEN.`parada` as origen, ORIGEN.hora as salida,  DESTINO.`parada` as destino, DESTINO.hora as llegada FROM `paradas`  ORIGEN, `paradas`  DESTINO  WHERE ORIGEN.id_ruta=DESTINO.id_ruta AND ORIGEN.hora<DESTINO.hora AND ORIGEN.parada='ZARAGOZA' AND DESTINO.parada='MADRID';
$origen= $_POST["origen"];
$destino = $_POST["destino"];
$fecha= $_POST["fecha"];
if (!empty($_POST["autobus"])) {
  $autobus=$_POST["autobus"] ;
} else{
  $autobus=" ";
}

if (!empty($_POST["tren"])) {
  $tren=$_POST["tren"] ;
} else{
  $tren=" ";
}

//echo $fecha;
//$query = "SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`id_ruta` IN (SELECT `id` FROM `rutas` WHERE `lugar_salida`='$origen')) AND (`parada`= '$origen' OR `parada`= '$destino') ORDER BY `hora`;";
//$query2 ="SELECT *, MIN(`hora`), MAX(`hora`) FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`parada`='$origen' OR `parada`='$destino' ) GROUP BY(`id_ruta`);";
$query3 = "SELECT ORIGEN.`parada` as origen, ORIGEN.hora as salida,  DESTINO.`parada` as destino, DESTINO.hora as llegada, rutas.id_ruta, rutas.dias_semana, rutas.medio,  rutas.operador, (SELECT web FROM `operadores` WHERE nombre =rutas.operador) as web  FROM `paradas`  ORIGEN, `paradas`  DESTINO, `rutas`   WHERE ORIGEN.id_ruta=DESTINO.id_ruta AND ORIGEN.hora<DESTINO.hora AND ORIGEN.parada='$origen' AND DESTINO.parada='$destino' AND ORIGEN.id_ruta=rutas.id AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fecha'), '%') AND (rutas.medio='$autobus' OR rutas.medio='$tren') ORDER BY DESTINO.hora;";
/*echo "<br><br><br>";
echo $query3;
echo "<br><br><br>";*/
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query3);
//var_dump($sql);
echo "<br>";
?>
<div class="d-flex  justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
  <div class="p-3">
  <?php
  echo "<h4>Origen: $origen</h4>";
  ?></div>
  <div class="p-3"><?php
  echo "<h4>Destino: $destino</h4>";

  ?></div>
  <div class="p-3">
  <a href="index.php" class="btn btn-primary w-50">Volver atrás</a>
  </div>
  </div>
</div>
<br>


<?php

$rows = array();
while ($row = mysqli_fetch_assoc($sql)) {
  array_push($rows, $row);
    //print_r($rows, $row);
}
$transbordo=false;
if (count($rows)==0){
  //echo "No se ha encontrado ningún resultado";
  $transbordo=true;
  $query3="SELECT ORIGEN.* , P1.*, P2.* , DESTINO.*, ORIGEN.parada as origen, ORIGEN.hora as salida, P1.parada as parada_tr, P1.hora as llegada_tr, P2.hora as salida_tr, DESTINO.parada as destino, DESTINO.hora as llegada, (SELECT operador from rutas WHERE id=ORIGEN.id_ruta) as operador1, (SELECT operador from rutas WHERE id=DESTINO.id_ruta) as operador2, (SELECT web from operadores WHERE operadores.nombre=operador1) as web1, (SELECT web from operadores WHERE operadores.nombre=operador2) as web2, (SELECT medio from rutas WHERE id=ORIGEN.id_ruta) as medio1, (SELECT medio from rutas WHERE id=DESTINO.id_ruta) as medio2 FROM `paradas` ORIGEN, `paradas` DESTINO, `paradas` P1, `paradas` P2 WHERE ORIGEN.hora<DESTINO.hora AND ORIGEN.hora<P1.hora AND ORIGEN.parada='$origen' AND DESTINO.parada='$destino' AND ORIGEN.id_ruta=P1.id_ruta AND P1.parada=P2.parada AND P2.id_ruta=DESTINO.id_ruta;";
  $sql=$conexion->query($query3);
  while ($row = mysqli_fetch_assoc($sql)) {
    array_push($rows, $row);
      //print_r($rows, $row);
  }
}
//var_dump($rows);


//$row = mysqli_fetch_array($sql);
//var_dump($row);
?>
<?php
if ($transbordo==false){
  ?>
  <div class="row justify-content-center">
  <div class="col-sm-8 col-12 p-3">
    
      
        <?php
        for ($i=0; $i < count($rows); $i++) { 
          echo "<div class='card'>";
          echo "<div class='card-body'>";
          echo "<table class='table'>";
          echo "<tr>";
          echo "<td>".$rows[$i]["origen"]."</td>";
          echo "<td>".$rows[$i]["salida"]."</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>".$rows[$i]["destino"]."</td>";
          echo "<td>".$rows[$i]["llegada"]."</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>".$rows[$i]["medio"]."</td>";
          echo "<td>".$rows[$i]["operador"]."</td>";
          echo "</tr>";
          echo "</table>";
          ?>
          
          <a href="<?php echo $rows[$i]["web"] ?>" class="btn btn-primary">Ir a la web de la compañía</a>
          <?php
          echo "</div>";
          echo "</div>";
          echo "<br>";
        }

        ?>
      

  </div>
</div>

<?php
} else {
  ?>
  <div class="row justify-content-center">
  <div class="col-sm-8 col-12 p-3">
    
      
        <?php
        for ($i=0; $i < count($rows); $i++) { 
          echo "<div class='card'>";
          echo "<div class='card-body'>";
          echo "<table class='table'>";
          echo "<tr>";
          echo "<td>".$rows[$i]["origen"]."</td>";
          echo "<td>".$rows[$i]["salida"]."</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>".$rows[$i]["destino"]."</td>";
          echo "<td>".$rows[$i]["llegada"]."</td>";
          echo "</tr>";
          echo "</table>";
          ?>
          <p>
          <button class="btn btn-primary w-75" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Más Información
              </button>
            
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <?php
              echo "<table class='table'>";
              echo "<tr>";
              echo "<td>".$rows[$i]["origen"]."</td>";
              echo "<td>".$rows[$i]["salida"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>".$rows[$i]["parada_tr"]."</td>";
              echo "<td>".$rows[$i]["llegada_tr"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>".$rows[$i]["medio1"]."</td>";
              echo "<td>".$rows[$i]["operador1"]."</td>";
              echo "</table>"
              ?>
              <td><a href="<?php echo $rows[$i]["web1"] ?>" class="btn btn-primary w-50">Ir a la web de la compañía</a></td>
              </table>
              <br>

              <?php
              echo "<table class='table'>";
              echo "<td>".$rows[$i]["parada_tr"]."</td>";
              echo "<td>".$rows[$i]["salida_tr"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>".$rows[$i]["destino"]."</td>";
              echo "<td>".$rows[$i]["llegada"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>".$rows[$i]["medio2"]."</td>";
              echo "<td>".$rows[$i]["operador2"]."</td>";
              echo "</table>"
              ?>
              <td><a href="<?php echo $rows[$i]["web1"] ?>" class="btn btn-primary w-50">Ir a la web de la compañía</a></td>
              </table>
            </div>
          </div>
    
          
          
          <?php
          echo "</div>";
          echo "</div>";
          echo "<br>";
        }

        ?>
      

  </div>
</div>

<?php
}

if (isset($_SESSION)) {
  $id=$_SESSION["id"];
  $query="INSERT INTO `historial`(`id`, `origen`, `destino`, `ruta`, `parada`, `fecha`, `autobus`, `tren`, `id_usuario`) VALUES (NULL,'$origen','$destino',NULL,NULL,'$fecha','$autobus','$tren','$id');";

  $conexion->query($query);
};
?>


<footer>
     <?php require_once('footer.html');?>
</footer>
</html>