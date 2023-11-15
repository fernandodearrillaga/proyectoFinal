<header>
        <?php require_once('header.html');?>
    </header>

<?php
//echo "resultado";
//var_dump($_POST);
$origen= $_POST["origen"];
$destino = $_POST["destino"];
$query = "SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`id_ruta` IN (SELECT `id` FROM `rutas` WHERE `lugar_salida`='$origen')) AND (`parada`= '$origen' OR `parada`= '$destino') ORDER BY `hora`;";
echo "<br><br><br>";
//echo $query;
echo "<br><br><br>";
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query);
//var_dump($sql);
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
foreach ($sql as $row) {
    //var_dump($row);
    echo "<br>".$row["parada"];
    echo $row["hora"];
    /*foreach ($row as  $value) {
        echo "<br>".$value;
    }*/
    
    //array_push($lugares, $value["parada"]);
    //var_dump($value);
    
}
?>
<footer>
     <?php require_once('footer.html');?>
</footer>