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
          echo "<tr>";
          echo "<td>".$rows[$i]["medio"]."</td>";
          echo "<td>".$rows[$i]["operador"]."</td>";
          echo "<tr>";
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

<footer>
     <?php require_once('footer.html');?>
</footer>