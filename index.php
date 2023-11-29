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
        <title>Planificador de rutas</title>
        <script src="validacion.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <?php require_once('header.php');?>
    </header>
    <body>
    <div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
        <h1 class="p-3"> Planificador de rutas</h1>
</div>
</div>
        <?php
        

        $conexion=mysqli_connect("localhost", "root", "", "transporte");
        
        $sql=$conexion->query("SELECT DISTINCT `parada` FROM `paradas` ORDER BY `parada`");

        $lugares=[];
        foreach ($sql as $value) {

            array_push($lugares, $value["parada"]);

            
        }

        ?>
        <br>
        <div class="d-flex justify-content-center">
        <div class="card col-12 col-md-6  ">
        <form name="busqueda" class="formulario" action="resultado.php" method="post" onsubmit="return validacion()">
        <div class="p-1">
            <label>Origen</label>
        <select name="origen" id="origen">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>
        </div>
        

        <div class="p-1">
        <label>Destino</label>
        <select name="destino" id="destino">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>
        </div>
        
        <div class="p-1"><input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>"></div>
        <div class="p-1"><input type="checkbox" id="autobus" name="autobus" value="AUTOBUS" checked>
        <label for="autobus"> AUTOBÚS</label><br>
        <input type="checkbox" id="tren" name="tren" value="TREN" checked>
        <label for="tren"> TREN </label></div>
        <div class="p-1"><input type="submit" class="btn btn-primary" value="BUSCAR"></div>
        </form>
        </div>
        </div>
        <br>
        
        

        <div class="row justify-content-around">
            <?php
            $pagina="inicio";
            if (isset($_SESSION["usuario"])) {
                require_once("historial.php");
            }
            
            require_once("tarjetarutas.html");
            require_once("tarjetahorarios.html");
            ?>
        </div>
    </body>

    <footer>
        <?php require_once('footer.html');?>
    </footer>
</html>
