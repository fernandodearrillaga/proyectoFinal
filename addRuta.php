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
        <h1 class="p-3"> Añadir ruta</h1>
</div>
</div>
<br>
<body>
<div class="d-flex  justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">

  <form action="addRuta2.php" method="post">

  <div class="mb-3">
    <label for="Origen" class="form-label">Origen</label>
    <input type="text"
      class="form-control" name="origen" id="origen" aria-describedby="helpId" placeholder="Origen" required>
    
  </div>
  <div class="mb-3">
    <label for="Destino" class="form-label">Destino</label>
    <input type="text"
      class="form-control" name="destino" id="destino" aria-describedby="helpId" placeholder="Destino" required>
    
  </div>

<div class="mb-3">
    <label for="medio" class="form-label">Medio</label>
    <?php
    $conexion=mysqli_connect("localhost", "root", "", "transporte");
        
    $sql=$conexion->query("SELECT DISTINCT `medio` FROM `rutas` ORDER BY `medio`");
    $medios=[];
    $operadores=[];
        foreach ($sql as $value) {

            array_push($medios, $value["medio"]);
        }
    ?>
    <select class="form-select form-select-lg" name="medio" id="medio">
        <?php
        foreach ($medios as $value){
            echo "<option value='$value'> $value </option>";
        }
        ?>

    </select>
</div>
<?php
$sql=$conexion->query("SELECT DISTINCT `nombre` FROM `operadores` ORDER BY `nombre` ");
foreach ($sql as $value) {

    array_push($operadores, $value["nombre"]);
}
?>
<div class="mb-3">
    <label for="Operador" class="form-label">Operador</label>
    <select class="form-select form-select-lg" name="operador" id="operador">
        
    <?php
        foreach ($operadores as $value){
            echo "<option value='$value'> $value </option>";
        }
        ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="Salida" class="form-label">Salida</label>
    <input type="time"
      class="form-control" name="salida" id="salida" aria-describedby="helpId" placeholder="Salida" required>
    
  </div>
  <div class="mb-3">
    <label for="Llegada" class="form-label">Llegada</label>
    <input type="time"
      class="form-control" name="llegada" id="llegada" aria-describedby="helpId" placeholder="Llegada" required>
    
  </div>

  <div class="weekDays-selector mb-3">
  <input type="checkbox" id="weekday-mon" name="lunes" class="weekday" value="0" />
  <label for="weekday-mon">Lunes</label>
  <input type="checkbox" id="weekday-tue" name="martes" class="weekday" value="1" />
  <label for="weekday-tue">Martes</label>
  <input type="checkbox" id="weekday-wed" name="miercoles" class="weekday" value="2" />
  <label for="weekday-wed">Miércoles</label>
  <input type="checkbox" id="weekday-thu" name="jueves" class="weekday" value="3" />
  <label for="weekday-thu">Jueves</label>
  <input type="checkbox" id="weekday-fri" name="viernes" class="weekday" value="4" />
  <label for="weekday-fri">Viernes</label>
  <input type="checkbox" id="weekday-sat" name="sabado" class="weekday" value="5" />
  <label for="weekday-sat">Sábado</label>
  <input type="checkbox" id="weekday-sun" name="domingo" class="weekday" value="6" />
  <label for="weekday-sun">Domingo</label>
</div>
<div class="p-3">
  <button type="submit" class="btn btn-primary w-50">Añadir ruta</button>
    </div>
  </form>
  <div class="p-3">
  <a href="rutas.php" class="btn btn-secondary w-50">Volver atrás</a>
  </div>
  </div>
</div>
</body>

<footer>
        <?php require_once('footer.html');?>
    </footer>
</html>