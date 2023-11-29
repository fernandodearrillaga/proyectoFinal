<?php
session_start();
?>

<?php
//var_dump($_POST);
$viaje=$_SESSION["viaje"];
$parada=strtoupper($_POST["parada"]);
$hora=$_POST["hora"];


$conexion=mysqli_connect("localhost", "root", "", "transporte");

$query="INSERT INTO `paradas`(`id`, `id_ruta`, `parada`, `hora`) VALUES (NULL,'$viaje','$parada','$hora')";
//echo $query;
$sql=$conexion->query($query);
//$query="INSERT INTO `paradas`(`id`, `id_ruta`, `parada`, `hora`) VALUES (NULL, (SELECT MAX(`id`) FROM `rutas`),'$destino','$llegada')";
//$sql=$conexion->query($query);

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
        <h1 class="p-3"> La parada se ha añadido correctamente</h1>
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


