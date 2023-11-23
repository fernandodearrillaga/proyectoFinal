<header>
        <?php require_once('header.html');?>
    </header>

<?php

var_dump($_POST);
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
echo $fecha;
//$query = "SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`id_ruta` IN (SELECT `id` FROM `rutas` WHERE `lugar_salida`='$origen')) AND (`parada`= '$origen' OR `parada`= '$destino') ORDER BY `hora`;";
//$query2 ="SELECT *, MIN(`hora`), MAX(`hora`) FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`parada`='$origen' OR `parada`='$destino' ) GROUP BY(`id_ruta`);";

if ($_POST["direccion"]=="Origen") {
  $query3 = "SELECT  *, paradas.hora, rutas.lugar_llegada, (SELECT web FROM `operadores` WHERE nombre =rutas.operador) as web  FROM `paradas`, `rutas`, `operadores` WHERE `parada`='$parada' AND paradas.id_ruta=rutas.id AND rutas.lugar_llegada!=`parada` AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fecha'), '%') AND (rutas.medio='$autobus' OR rutas.medio='$tren') AND rutas.operador=operadores.nombre  ORDER BY `hora` ";

  echo "<h1>Salidas desde ". $parada."</h1>";
} else{
  $query3 = "SELECT  *, paradas.hora, rutas.lugar_llegada, (SELECT web FROM `operadores` WHERE nombre =rutas.operador) as web  FROM `paradas`, `rutas`, `operadores` WHERE `parada`='$parada' AND paradas.id_ruta=rutas.id AND rutas.lugar_llegada=`parada` AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fecha'), '%') AND (rutas.medio='$autobus' OR rutas.medio='$tren') AND rutas.operador=operadores.nombre  ORDER BY `hora` ";
  echo "<h1>Llegadas a ". $parada."</h1>";
}
echo "<br><br><br>";
echo $query3;
echo "<br><br><br>";
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query3);
var_dump($sql);
echo "<br>";
?>

<?php

$rows = array();
while ($row = mysqli_fetch_assoc($sql)) {
  array_push($rows, $row);
    //print_r($rows, $row);
}
var_dump($rows);


//$row = mysqli_fetch_array($sql);
//var_dump($row);
?>
<div class="row">
  <div class="col-sm-8">
    
      
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


echo "<tr>";

echo  "<td>".$row["origen"]."</td>";
echo  "<td>".$row["salida"]."</td>";
echo "</tr>";
echo "<tr>";
echo  "<td>".$row["destino"]."</td>";
echo  "<td>".$row["llegada"]."</td>";
echo "</tr>";


foreach ($sql as $row) {
    //var_dump($row);
    
    
    
    
    
    //echo "<br>".$row["parada"];
    //echo $row["hora"];
    /*foreach ($row as  $value) {
        echo "<br>".$value;
    }*/
    
    //array_push($lugares, $value["parada"]);
    //var_dump($value);
    
}
?>
</table>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <table class="table table-bordered">
      <?php
      foreach ($sql as $row) {

          
          echo "<tr>";
          echo  "<td>".$row["parada"]."</td>";
          echo  "<td>".$row["hora"]."</td>";
          echo "</tr>";

          
      }
      ?>
      </table>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
<footer>
     <?php require_once('footer.html');?>
</footer>