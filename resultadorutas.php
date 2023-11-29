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

<div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
<h1 class="p-4">Resultados de la búsqueda</h1>
<div class="p-3">
  <a href="rutas.php" class="btn btn-primary w-50">Volver atrás</a>
  </div>
</div>
</div>

<?php
//var_dump($_POST);
$ruta= $_POST["ruta"];
$_SESSION["ruta"]=$ruta;
$rutaSesion=$_SESSION["ruta"];

$fecha= $_POST["fecha"];
$_SESSION["fecha"]=$fecha;
$fechaSesion=$_SESSION["fecha"];
$query = "SELECT *, rutas.id as viaje, operadores.web FROM `paradas`, rutas, operadores WHERE rutas.lugar_salida=(SELECT lugar_salida from rutas where id_ruta=$rutaSesion GROUP BY lugar_salida) AND rutas.lugar_llegada=(SELECT lugar_llegada from rutas where id_ruta=$rutaSesion GROUP BY lugar_llegada) AND paradas.id_ruta=rutas.id AND rutas.medio=(SELECT medio from rutas where id_ruta=$rutaSesion GROUP BY medio) AND rutas.operador=operadores.nombre AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fechaSesion'), '%') ORDER BY rutas.id, rutas.hora_salida, paradas.hora";
//echo $query;
//echo "<br><br><br>";
//echo $query;
//echo "<br><br><br>";
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query);
//var_dump($sql);
echo "<br>";

$rows = array();
while ($row = mysqli_fetch_assoc($sql)) {
  array_push($rows, $row);
    //print_r($rows, $row);
}
?>



<div class="row justify-content-center">
  <div class="col-12 col-sm-8">
    
      
        <?php
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<table class='table'>";
        $viaje=$rows[0]["viaje"];
        
        for ($i=0; $i < count($rows); $i++) { 
          
            if ($rows[$i]["viaje"]!=$viaje) {
                echo "</table>";

                if ($_SESSION["tipo"]=="admin") {
                  ?>
                  <a href="addParada.php" class="btn btn-warning">Añadir parada</a>
                  <?php
              }
                echo "</div>";
                echo "</div>";
                echo "<br>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<table class='table'>";
            }
            $viaje=$rows[$i]["viaje"];
          echo "<tr>";
          
          echo "<td>".$rows[$i]["parada"]."</td>";
            echo "<td>".$rows[$i]["hora"]."</td>";
            
          
            
          
          
          
          echo "</tr>";
          
          
          
        }
        
          
          
        echo "</table>";
        if ($_SESSION["tipo"]=="admin") {
          ?>
          <form>
            
          </form>
          <a href="addParada.php" class="btn btn-warning">Añadir parada</a>
          <?php
      }
      echo "</div>";
      echo "</div>";
          ?>
          <br>
          <div class="d-flex justify-content-center">
          <div class="card col-12  p-3 ">
          <table class='table'>
          <tr>
            <td><?php echo $rows[0]["operador"]?></td>
            <td><a href="<?php echo $rows[0]["web"] ?>" class="btn btn-primary">Ir a la web de la compañía</a></td>

            
          </tr>
          <?php
          /*if ($_SESSION["tipo"]=="admin") {
            ?>
            <a href="addParada.php" class="btn btn-warning">Añadir parada</a>
            <?php
        }*/
          ?>
    </table>
          
          <?php
          echo "</div>";
          echo "</div>";
          echo "<br>";

        ?>
      

  </div>
</div>

</table>


<?php
if (isset($_SESSION)) {
  $id=$_SESSION["id"];
  $query="INSERT INTO `historial`(`id`, `origen`, `destino`, `ruta`, `parada`, `fecha`, `id_usuario`) VALUES (NULL,NULL,NULL,$ruta,NULL,'$fecha', '$id');";

  $conexion->query($query);
};
?>

<footer>
     <?php require_once('footer.html');?>
</footer>
</html>