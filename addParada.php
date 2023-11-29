<?php
session_start();
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
        <title>Añadir parada</title>
        <script src="validacion.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <?php require_once('header.php');?>
    </header>
    <body>
    <div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
        <h1 class="p-3"> Añadir parada</h1>
</div>
</div>
<br>
<body>
<div class="d-flex  justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">

  <form action="addParada2.php" method="post">

  <div class="mb-3">
    <label for="Parada" class="form-label">Parada</label>
    <input type="text"
      class="form-control" name="parada" id="parada" aria-describedby="helpId" placeholder="Parada" required>
    
  </div>



    
    <?php
    $conexion=mysqli_connect("localhost", "root", "", "transporte");
    $_SESSION["viaje"]=$_POST["viaje"];
        
    $sql=$conexion->query("SELECT DISTINCT `medio` FROM `rutas` ORDER BY `medio`");
    $medios=[];
    $operadores=[];
        foreach ($sql as $value) {

            array_push($medios, $value["medio"]);
        }
    ?>
    

<?php
$sql=$conexion->query("SELECT DISTINCT `nombre` FROM `operadores` ORDER BY `nombre` ");
foreach ($sql as $value) {

    array_push($operadores, $value["nombre"]);
}
?>


  <div class="mb-3">
    <label for="Hora" class="form-label">Hora</label>
    <input type="time"
      class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="Hora" required>
    
  </div>


  <div class="p-3">
  <button type="submit" class="btn btn-primary w-50">Añadir parada</button>
</div>
  </form>
  <div class="p-3">
  <a href="resultadorutas.php" class="btn btn-secondary w-50">Volver atrás</a>
  </div>
  </div>
</div>
</body>

<footer>
        <?php require_once('footer.html');?>
    </footer>
</html>