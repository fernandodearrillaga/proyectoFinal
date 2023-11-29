<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <?php require_once('header.php');?>
</header>
<body class="d-flex flex-column min-vh-100">
        <div class="d-flex justify-content-center p-3">
        <div class="card col-12 col-md-6  ">
    <form action="correoRegistrado.php" method="post">

        <div class="p-2 form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre" placeholder="Nombre" required>
            
          </div>
          <div class="p-2 form-group">
            <label for="Contraseña">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
          </div>
          <div class="p-2 form-group">
            <label for="Correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
          </div>
          <div class="p-2 form-group">
          <button type="submit" class="btn btn-primary" >Registrarse</button>
          </div>

    </form>
</div>
</div>
</body>
<footer>
     <?php require_once('footer.html');?>
</footer>
</html>