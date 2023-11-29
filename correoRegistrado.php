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

<?php

//var_dump($_POST);
$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$password= $_POST["password"];
        $conexion=mysqli_connect("localhost", "root", "", "transporte");


        $sql=$conexion->query("INSERT INTO `usuarios`(`id`, `nombre`, `correo`, `contraseña`, `Tipo`) VALUES ('','$nombre','$correo','$password','usuario')");
?>
        <div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
    <p>El correo se ha registrado correctamente</p>
</div>
</div>
<?php
?>
</body>
<footer>
    <?php require_once('footer.html');?>
</footer>
</html>