<header>
        <?php require_once('header.html');?>
    </header>

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
echo $fecha;
//$query = "SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`id_ruta` IN (SELECT `id` FROM `rutas` WHERE `lugar_salida`='$origen')) AND (`parada`= '$origen' OR `parada`= '$destino') ORDER BY `hora`;";
//$query2 ="SELECT *, MIN(`hora`), MAX(`hora`) FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`parada`='$origen' OR `parada`='$destino' ) GROUP BY(`id_ruta`);";
$query3 = "SELECT ORIGEN.`parada` as origen, ORIGEN.hora as salida,  DESTINO.`parada` as destino, DESTINO.hora as llegada, rutas.id_ruta, rutas.dias_semana FROM `paradas`  ORIGEN, `paradas`  DESTINO, `rutas`  WHERE ORIGEN.id_ruta=DESTINO.id_ruta AND ORIGEN.hora<DESTINO.hora AND ORIGEN.parada='$origen' AND DESTINO.parada='$destino' AND ORIGEN.id_ruta=rutas.id AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fecha'), '%');";
echo "<br><br><br>";
echo $query3;
echo "<br><br><br>";
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query3);
var_dump($sql);
echo "<br>";
?>
<table>
  
  <tr>
    <th></th>
    <th>Salida</th>
    <th>Llegada</th>
  </tr>
  <tr>
    <th></th>
    <td>A1</td>
    <td>B1</td>
  </tr>
  <tr>
    <th></th>
    <td>A2</td>
    <td>B2</td>
  </tr>
</table>
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
          echo "<td>".$rows[$i]["origen"]."</td>";
          echo "<td>".$rows[$i]["salida"]."</td>";
          echo "<tr>";
          echo "<tr>";
          echo "<td>".$rows[$i]["destino"]."</td>";
          echo "<td>".$rows[$i]["llegada"]."</td>";
          echo "<tr>";
          echo "</table>";
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