<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salidas y llegadas</title>
    <script src="validacion.js"></script>
</head>
<header>
    <?php require_once('header.php');?>
</header>
<body>
    <h1 class="p-3">Salidas y llegadas</h1>
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

        <form name="busqueda" class="formulario border border-primary col-12 col-md-7 m-2 p-3" action="resultadoparadas.php" method="post" onsubmit="return validacionParadas()">
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
        <input type="radio" id="origen" name="direccion" value="Origen" checked>
        <label for="origen">Origen</label>
        <input type="radio" id="destino" name="direccion" value="Destino">
        <label for="destino">Destino</label><br>
        <input type="checkbox" id="autobus" name="autobus" value="AUTOBUS" checked>
        <label for="autobus"> AUTOBÚS</label><br>
        <input type="checkbox" id="tren" name="tren" value="TREN" checked>
        <label for="tren"> TREN </label><br>
        <input type="submit" class="btn btn-primary" value="BUSCAR">
        </form>

        <div class="row justify-content-around">
            <?php
            require_once("tarjetaplanificador.html");
            require_once("tarjetarutas.html");
            ?>
        </div>
</body>
<footer>
    <?php require_once('footer.html');?>
</footer>
</html>