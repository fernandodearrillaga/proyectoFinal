<header>
        <?php require_once('header.html');?>
    </header>

<?php
//echo "resultado";
//var_dump($_POST);
//SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='ZARAGOZA') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='BARCELONA') AND (`parada`='ZARAGOZA' OR `parada`='BARCELONA' );
//SELECT *, MIN(hora), MAX(hora) FROM `paradas` WHERE (`id_ruta`=1 OR `id_ruta`=2) AND (`parada`='ZARAGOZA' or `parada`='BARCELONA') group BY(`id_ruta`)
//SELECT *, MIN(`hora`), MAX(`hora`) FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='ZARAGOZA') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='BARCELONA') AND (`parada`='ZARAGOZA' OR `parada`='BARCELONA' ) GROUP BY(`id_ruta`)
$origen= $_POST["origen"];
$destino = $_POST["destino"];
//$query = "SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`id_ruta` IN (SELECT `id` FROM `rutas` WHERE `lugar_salida`='$origen')) AND (`parada`= '$origen' OR `parada`= '$destino') ORDER BY `hora`;";
$query2 ="SELECT *, MIN(`hora`), MAX(`hora`) FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`parada`='$origen' OR `parada`='$destino' ) GROUP BY(`id_ruta`);";
echo "<br><br><br>";
echo $query2;
echo "<br><br><br>";
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query2);
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
<table class="table">
<?php
$row = mysqli_fetch_array($sql);
//var_dump($row);
echo "<tr>";
echo  "<td>".$origen."</td>";
echo  "<td>".$row["MIN(`hora`)"]."</td>";
echo "</tr>";
echo "<tr>";
echo  "<td>".$destino."</td>";
echo  "<td>".$row["MAX(`hora`)"]."</td>";
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