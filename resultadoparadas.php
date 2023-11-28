<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la búsqueda</title>
</head>
<header>
        <?php require_once('header.php');?>
    </header>

<?php

//var_dump($_POST);
$parada= $_POST["parada"];

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
?><div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">


<?php
if ($_POST["direccion"]=="Origen") {
  $query3 = "SELECT  *, paradas.hora, rutas.lugar_llegada, (SELECT web FROM `operadores` WHERE nombre =rutas.operador) as web  FROM `paradas`, `rutas`, `operadores` WHERE `parada`='$parada' AND paradas.id_ruta=rutas.id AND rutas.lugar_llegada!=`parada` AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fecha'), '%') AND (rutas.medio='$autobus' OR rutas.medio='$tren') AND rutas.operador=operadores.nombre  ORDER BY `hora` ";

  echo "<h1>Salidas desde ". $parada."</h1>";
} else{
  $query3 = "SELECT  *, paradas.hora, rutas.lugar_llegada, (SELECT web FROM `operadores` WHERE nombre =rutas.operador) as web  FROM `paradas`, `rutas`, `operadores` WHERE `parada`='$parada' AND paradas.id_ruta=rutas.id AND rutas.lugar_llegada=`parada` AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fecha'), '%') AND (rutas.medio='$autobus' OR rutas.medio='$tren') AND rutas.operador=operadores.nombre  ORDER BY `hora` ";
  echo "<h1>Llegadas a ". $parada."</h1>";
}
?><a href="paradas.php" class="btn btn-primary w-25">Volver atrás</a>
</div>
</div>
<?php

echo "<br><br><br>";
//echo $query3;
echo "<br><br><br>";
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query3);
//var_dump($sql);
echo "<br>";
?>

<?php

$rows = array();
while ($row = mysqli_fetch_assoc($sql)) {
  array_push($rows, $row);
    //print_r($rows, $row);
}
//var_dump($rows);


//$row = mysqli_fetch_array($sql);
//var_dump($row);
?>
<div class="row justify-content-center">
  <div class="col-sm-8 col-12">
    
      
        <?php
        for ($i=0; $i < count($rows); $i++) { 
          echo "<div class='card'>";
          echo "<div class='card-body'>";
          echo "<table class='table'>";
          echo "<tr>";
          if ($_POST["direccion"]=="Origen") {
            echo "<td>".$rows[$i]["lugar_llegada"]."</td>";
          } else{
            echo "<td>".$rows[$i]["lugar_salida"]."</td>";
          }
          
          echo "<td>".$rows[$i]["hora"]."</td>";
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
<table class="table">
<?php
if (isset($_SESSION)) {
  $id=$_SESSION["id"];
  if($_POST["direccion"]=="Origen"){

    $query="INSERT INTO `historial`(`id`, `origen`, `destino`, `ruta`, `parada`, `fecha`, `id_usuario`) VALUES (NULL,'origen',NULL,NULL,'$parada','$fecha','$id');";
  }else{
    $query="INSERT INTO `historial`(`id`, `origen`, `destino`, `ruta`, `parada`, `fecha`, `id_usuario`) VALUES (NULL,NULL,'destino',NULL,'$parada','$fecha','$id');";

  }
  

  $conexion->query($query);
};

?>
<footer>
     <?php require_once('footer.html');?>
</footer>
</html>