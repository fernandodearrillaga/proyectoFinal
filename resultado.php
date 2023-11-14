<?php
echo "resultado";
var_dump($_POST);
$origen= $_POST["origen"];
$destino = $_POST["destino"];
$query = "SELECT * FROM `paradas` WHERE `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$origen') AND `id_ruta` IN (SELECT `id_ruta` FROM `paradas` WHERE `parada`='$destino') AND (`parada`= '$origen' OR `parada`= '$destino');";
echo "<br><br><br>";
echo $query;
echo "<br><br><br>";
$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query($query);
var_dump($sql);
echo "<br>";
foreach ($sql as $value) {
    var_dump($value);
    
    //array_push($lugares, $value["parada"]);
    //var_dump($value);
    
}
?>