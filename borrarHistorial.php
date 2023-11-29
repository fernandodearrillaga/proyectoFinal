<?php
session_start();
var_dump($_POST);
$id=$_POST["id"];


$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query("DELETE FROM historial WHERE `historial`.`id` = $id;");
var_dump($sql);

if ($_SESSION["pagina"]=="inicio") {
    header("Location: index.php");
} else if ($_SESSION["pagina"]=="rutas"){
    header("Location: rutas.php");
}else if ($_SESSION["pagina"]=="paradas"){
    header("Location: paradas.php");
}

?>