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
<body>
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

        <form name="busqueda" class="formulario" action="resultadoparadas.php" method="post" onsubmit="return validacion()">
        <label>Parada</label>
        <select name="parada" id="parada">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>
        <br>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>"><br>
        <input type="radio" id="origen" name="direccion" value="Origen">
        <label for="origen">Origen</label>
        <input type="radio" id="destino" name="direccion" value="Destino">
        <label for="destino">Destino</label><br>
        <input type="checkbox" id="medios" name="autobus" value="AUTOBUS" checked>
        <label for="autobus"> AUTOBÚS</label><br>
        <input type="checkbox" id="medios" name="tren" value="TREN" checked>
        <label for="tren"> TREN </label><br>
        <input type="submit" value="BUSCAR">
        </form>
</body>
<footer>
    <?php require_once('footer.html');?>
</footer>
</html>