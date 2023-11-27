<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutas</title>
</head>
<header>
    <?php require_once('header.html');?>
</header>
<body>
    <h1>Todas las rutas</h1>
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

        <form name="busqueda" class="formulario border border-primary col-12 col-md-7 m-2 p-3" action="resultadorutas.php" method="post">
        <label>Ruta</label>
        <select name="ruta" id="ruta">
            <?php
            foreach ($rutas as $value){
                echo "<option value=".$value['id_ruta'].">". $value["lugar_salida"]."-".$value["lugar_llegada"]. " ".$value["medio"]." </option>";
            }
            
            ?>

        </select>
        <br>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>"><br>
        
        <input type="submit" class="btn btn-primary" value="BUSCAR">
        </form>

        <div class="row justify-content-around">
            <?php
            require_once("tarjetaplanificador.html");
            require_once("tarjetahorarios.html");
            ?>
        </div>
</body>
<footer>
    <?php require_once('footer.html');?>
</footer>
</html>