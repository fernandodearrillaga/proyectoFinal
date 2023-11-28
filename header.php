<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Web de Transporte</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="rutas.php">Rutas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="paradas.php">Paradas</a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>-->
            </ul>


            <?php
            if (!isset($_SESSION["usuario"])) {
                ?>
                <div class="d-flex">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Iniciar sesión
                  </a>
                  <div class="dropdown-menu dropdown-menu-end menuIniciar">
                    <form class="px-4 py-3" method="post" action="iniciarSesion.php">
                      <div class="mb-3">
                        <label for="Usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                      </div>
                      <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                  </div>
                </li>
              </ul>
            </div>



              <div class="d-flex">
                <li class="navbar-nav">
                  <a class="nav-link" aria-current="page" href="registro.php">Registrarse</a>
                </li>
              </div>
              
              <?php
            } else{
                ?>

                <div class="d-flex">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION["usuario"] ?>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end menuIniciar">
                    <form class="px-4 py-3" method="post" action="cerrarSesion.php">
                      <div class="mb-3">

                      <a class="nav-link" href="cerrarSesion.php">Cerrar sesión</a>
                    </form>
                  </div>
                </li>
              </ul>
            </div>
            
            <?php
            }
            ?>
            


            </div>
          </div>
        </div>
      </nav>
</header>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>