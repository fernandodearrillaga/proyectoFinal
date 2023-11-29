<?php
session_start();
var_dump($_POST);
$usuario= $_POST["usuario"];
$pass=$_POST["password"];



$conexion=mysqli_connect("localhost", "root", "", "transporte");
$sql=$conexion->query("SELECT * FROM `usuarios` WHERE `nombre`='$usuario' and `contraseña`='$pass';");
var_dump($sql);

$row = mysqli_fetch_assoc($sql);
var_dump($row);
echo $row["nombre"];
$_SESSION["usuario"]=$row["nombre"];
$_SESSION["id"]=$row["id"];
$_SESSION["tipo"]=$row["Tipo"];
header("Location: index.php");
?>