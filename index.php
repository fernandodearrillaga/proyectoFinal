<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <header>
        <?php require_once('header.html');?>
    </header>
    <body>
        <?php
        $conexion=mysqli_connect("localhost", "root", "", "transporte");
        //echo "hola";
        $sql=$conexion->query("SELECT DISTINCT `parada` FROM `paradas`");
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

        <form class="formulario" action="resultado.php" method="post">
        <label>Origen</label>
        <select name="origen" id="origen">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>

        <label>Destino</label>
        <select name="destino" id="destino">
            <?php
            foreach ($lugares as $value){
                echo "<option value='$value'> $value </option>";
            }
            
            ?>

        </select>
        
        <input type="submit" value="Submit">
        </form>
        
        
    </body>

    <footer>
        <?php require_once('footer.html');?>
    </footer>
</html>
