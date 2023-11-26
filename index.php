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
        <?php require_once('header.html');?>
    </header>
    <body>
        <h1> Planificador de rutas</h1>
        <?php

        $conexion=mysqli_connect("localhost", "root", "", "transporte");
        //echo "hola";
        $sql=$conexion->query("SELECT DISTINCT `parada` FROM `paradas` ORDER BY `parada`");
        //var_dump($sql);
        //SELECT DISTINCT `lugar_salida` FROM `rutas`;
        $lugares=[];
        foreach ($sql as $value) {
          //  echo $value["parada"];
            array_push($lugares, $value["parada"]);
            //var_dump($value);
            
        }
       // var_dump($lugares);
        ?>
        <br>

        <form name="busqueda" class="formulario  border border-primary col-12 col-md-7 m-2 p-3" action="resultado.php" method="post" onsubmit="return validacion()">
        <label>Origen</label>
        <select name="origen" id="origen">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>
        <br>

        <label>Destino</label>
        <select name="destino" id="destino">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>
        <br>
        <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>"><br>
        <input type="checkbox" id="autobus" name="autobus" value="AUTOBUS" checked>
        <label for="autobus"> AUTOBÚS</label>
        <input type="checkbox" id="tren" name="tren" value="TREN" checked>
        <label for="tren"> TREN </label><br>
        <input type="submit" class="btn btn-primary" value="BUSCAR">
        </form>
        
        

        <div class="row justify-content-around">
            <?php
            require_once("tarjetarutas.html");
            require_once("tarjetahorarios.html");
            ?>
        </div>
    </body>

    <footer>
        <?php require_once('footer.html');?>
    </footer>
</html>
