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
<div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
    <h1 class="p-3">Salidas y llegadas</h1>
</div>
</div>
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

        <div class="d-flex justify-content-center">
        <div class="card col-12 col-md-6 ">
        <form name="busqueda" class="formulario" action="resultadoparadas.php" method="post" onsubmit="return validacionParadas()">
        <div class="p-1">
        <label>Parada</label>
        <select name="parada" id="parada">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>
        </div>
        <div class="p-1">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="p-1">
        <input type="radio" id="origen" name="direccion" value="origen" checked>
        <label for="origen">Origen</label>
        <input type="radio" id="destino" name="direccion" value="destino">
        <label for="destino">Destino</label>
        </div>
        <div class="p-1">
        <input type="checkbox" id="autobus" name="autobus" value="AUTOBUS" checked>
        <label for="autobus"> AUTOBÚS</label><br>
        <input type="checkbox" id="tren" name="tren" value="TREN" checked>
        <label for="tren"> TREN </label>
        </div>
        <div class="p-1">
        <input type="submit" class="btn btn-primary" value="BUSCAR">
        </div>
        </form>
        </div>
        </div>
        <br>

        <div class="row justify-content-around">
            <?php
            $pagina="paradas";
            if (isset($_SESSION["usuario"])) {
                require_once("historial.php");
            }
            require_once("tarjetaplanificador.html");
            require_once("tarjetarutas.html");
            ?>
        </div>
</body>
<footer>
    <?php require_once('footer.html');?>
</footer>
</html>