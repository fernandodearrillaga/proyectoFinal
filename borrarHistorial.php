<?php
session_start();
var_dump($_POST);
$id=$_POST["id"];
$id_usuario=$_SESSION["id"];


$conexion=mysqli_connect("localhost", "root", "", "transporte");
if (isset($id)) {
    $query="DELETE FROM historial WHERE `historial`.`id` = $id;";
} else {
    $query="DELETE FROM `historial` WHERE `id_usuario`=$id_usuario";
}

$sql=$conexion->query($query);
var_dump($sql);

if ($_SESSION["pagina"]=="inicio") {
    header("Location: index.php");
} else if ($_SESSION["pagina"]=="rutas"){
    header("Location: rutas.php");
}else if ($_SESSION["pagina"]=="paradas"){
    header("Location: paradas.php");
}

?>