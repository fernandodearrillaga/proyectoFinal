<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <?php require_once('header.html');?>
</header>
<body class="d-flex flex-column min-vh-100">
    <form action="correoRegistrado.php" method="post">

        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre" placeholder="Nombre">
            
          </div>
          <div class="form-group">
            <label for="Contraseña">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <label for="Correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</body>
<footer>
     <?php require_once('footer.html');?>
</footer>
</html>