<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la búsqueda</title>
</head>
<header>
        <?php require_once('header.html');?>
</header>
<?php
//var_dump($_POST);
$ruta= $_POST["ruta"];
$fecha= $_POST["fecha"];
$query = "SELECT *, rutas.id as viaje, operadores.web FROM `paradas`, rutas, operadores WHERE rutas.lugar_salida=(SELECT lugar_salida from rutas where id=$ruta) AND rutas.lugar_llegada=(SELECT lugar_llegada from rutas where id=$ruta) AND paradas.id_ruta=rutas.id AND rutas.medio=(SELECT medio from rutas where id=$ruta) AND rutas.operador=operadores.nombre AND `dias_semana` LIKE CONCAT('%', WEEKDAY('$fecha'), '%') ORDER BY rutas.id, rutas.hora_salida, paradas.hora";

echo "<br><br><br>";
//echo $query3;
echo "<br><br><br>";
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
                echo "<table class='table'>";
            }
            $viaje=$rows[$i]["viaje"];
          echo "<tr>";
          
          echo "<td>".$rows[$i]["parada"]."</td>";
            echo "<td>".$rows[$i]["hora"]."</td>";
            
          
            
          
          
          
          echo "</tr>";
          
          
        }
        echo "</table>";
          ?>
          <table class='table'>
          <tr>
            <td><?php echo $rows[0]["operador"]?></td>
            <td><a href="<?php echo $rows[0]["web"] ?>" class="btn btn-primary">Ir a la web de la compañía</a></td>
            
          </tr>
    </table>
          
          <?php
          echo "</div>";
          echo "</div>";
          echo "<br>";

        ?>
      

  </div>
</div>

</table>
<footer>
     <?php require_once('footer.html');?>
</footer>
</html>