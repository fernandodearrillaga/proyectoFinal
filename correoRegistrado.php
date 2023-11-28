<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutas</title>
</head>
<header>
    <?php require_once('header.html');?>
</header>
<body>
<h1>Rutas</h1>
<?php

var_dump($_POST);
$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$password= $_POST["password"];
        $conexion=mysqli_connect("localhost", "root", "", "transporte");


        $sql=$conexion->query("INSERT INTO `usuarios`(`id`, `nombre`, `correo`, `contraseña`, `Tipo`) VALUES ('','$nombre','$correo','$password','usuario')");

        echo ("Se ha registrado el usuario");
?>
</body>
<footer>
    <?php require_once('footer.html');?>
</footer>
</html>