<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutas</title>
    <script src="validacion.js"></script>
</head>
<header>
    <?php require_once('header.php');?>
</header>
<body>
<div class="d-flex justify-content-center">
  <div class="card col-12 col-md-6 p-3 ">
    <h1 class="p-3">Todas las rutas</h1>
</div>
</div>
<?php
        $conexion=mysqli_connect("localhost", "root", "", "transporte");
        //echo "hola";
        $sql=$conexion->query("SELECT * FROM `rutas` WHERE 1 GROUP BY `id_ruta` ORDER BY `lugar_salida`,`lugar_llegada` ,`medio`");
        //var_dump($sql);
        //SELECT DISTINCT `lugar_salida` FROM `rutas`;
        $rutas=[];
        while ($row = mysqli_fetch_assoc($sql)) {
            array_push($rutas, $row);
              //print_r($rows, $row);
          }
        //var_dump($rutas);
        ?>
        <br>

        <div class="d-flex justify-content-center">
        <div class="card col-12 col-md-6  ">
        <form name="busqueda" class="formulario" action="resultadorutas.php" method="post" onsubmit="return validacionFecha()">
        <div class="p-1">
        <label>Ruta</label>
        <select name="ruta" id="ruta">
            <?php
            foreach ($rutas as $value){
                echo "<option value=".$value['id_ruta'].">". $value["lugar_salida"]."-".$value["lugar_llegada"]. " ".$value["medio"]." </option>";
            }
            
            ?>

        </select>
        </div>
        <div class="p-1">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>"><br>
        </div>
        <div class="p-1">
        <input type="submit" class="btn btn-primary" value="BUSCAR">
        <?php
        if (isset($_SESSION["tipo"])) {
            if ($_SESSION["tipo"]=="admin") {
                ?>
                <a href="addRuta.php" class="btn btn-warning">Añadir ruta</a>
                <?php
            }
        }
        
        ?>
        </div>
        </form>
        </div>
        </div>
        <br>

        <div class="row justify-content-around">
            <?php
            $pagina="rutas";
            if (isset($_SESSION["usuario"])) {
                require_once("historial.php");
            }
            require_once("tarjetaplanificador.html");
            require_once("tarjetahorarios.html");
            ?>
        </div>
</body>


<footer>
    <?php require_once('footer.html');?>
</footer>
</html>