<?php
session_start();
?>

<?php
//var_dump($_POST);
$origen=strtoupper($_POST["origen"]);
$destino=strtoupper($_POST["destino"]);
$medio=$_POST["medio"];
$operador=$_POST["operador"];
$salida=$_POST["salida"];
$llegada=$_POST["llegada"];
$diasSemana="";
if (isset($_POST["lunes"])) {
    $diasSemana=$diasSemana."0";
}
if (isset($_POST["martes"])) {
    $diasSemana=$diasSemana."1";
}
if (isset($_POST["miercoles"])) {
    $diasSemana=$diasSemana."2";
}
if (isset($_POST["jueves"])) {
    $diasSemana=$diasSemana."3";
}
if (isset($_POST["viernes"])) {
    $diasSemana=$diasSemana."4";
}
if (isset($_POST["sabado"])) {
    $diasSemana=$diasSemana."5";
}
if (isset($_POST["domingo"])) {
    $diasSemana=$diasSemana."6";
}

$conexion=mysqli_connect("localhost", "root", "", "transporte");
$query="INSERT INTO `rutas`(`id`, `id_ruta`, `lugar_salida`, `lugar_llegada`, `hora_salida`, `hora_llegada`, `dias_semana`, `medio`, `operador`) VALUES (NULL, (SELECT MAX(`id_ruta`)+1 FROM `rutas` as rutas2), '$origen', '$destino' ,'$salida','$llegada','$diasSemana','$medio','$operador')";
//echo $query;
$sql=$conexion->query($query);
$query="INSERT INTO `paradas`(`id`, `id_ruta`, `parada`, `hora`) VALUES (NULL, (SELECT MAX(`id`) FROM `rutas`),'$origen','$salida')";
$sql=$conexion->query($query);
$query="INSERT INTO `paradas`(`id`, `id_ruta`, `parada`, `hora`) VALUES (NULL, (SELECT MAX(`id`) FROM `rutas`),'$destino','$llegada')";
$sql=$conexion->query($query);

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir ruta</title>
        <script src="validacion.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <?php require_once('header.php');?>
    </header>
    <body>
    <div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
        <h1 class="p-3"> La ruta se ha añadido correctamente</h1>
        <div class="p-3">
        <a href="rutas.php" class="btn btn-secondary w-50">Volver atrás</a>
        </div>
</div>
</div>
<br>


</body>

<footer>
        <?php require_once('footer.html');?>
    </footer>
</html>


