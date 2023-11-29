<div class="d-flex justify-content-center">
    <div class="card text-start col-12 col-lg-9">
      
      <div class="card-body">
        <h4 class="card-title">Historial</h4>
        <?php
        $_SESSION["pagina"]=$pagina;
        $id=$_SESSION["id"];
        if ($pagina=="inicio") {
            $query="SELECT * FROM `historial` WHERE `origen` IS not null AND `destino` IS not null AND `id_usuario`=$id order BY `id` desc;";
        } elseif ($pagina=="rutas") {
            $query="SELECT * FROM `historial` WHERE `ruta` IS NOT NULL AND `id_usuario`=$id  order BY `id` desc;";
        } elseif ($pagina=="paradas") {
            $query="SELECT * FROM `historial` WHERE (`origen` is null AND `destino` is not null) OR (`origen` is NOT null AND `destino` is null) AND `id_usuario`=$id  order BY `id` desc;";
        }

        $sql=$conexion->query($query);
        //var_dump($sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($sql)) {
        array_push($rows, $row);
    
        }
        ?>
        
        <table class="table table-stripped">
        <form action="borrarHistorial.php" method="post">
            
            <td><input type="submit" class="btn btn-danger" value="Borrar historial"></a></td>
            </form>
        <?php
        for ($i=0; $i < count($rows); $i++) { 
            echo "<tr>";?>
            <form action="borrarHistorial.php" method="post">
            <input type = "hidden" name = "id" value = "<?php echo $rows[$i]['id']?>" />
            <td><input type="submit" class="btn btn-danger" value="-"></a></td>
            </form>

            
            <?php
            if($pagina=="inicio"){
                echo "<td>". $rows[$i]["origen"] ."</td>";
                echo "<td>". $rows[$i]["destino"]."</td>";
                echo "<td>". $rows[$i]["fecha"] ."</td>";
                echo "<td>". $rows[$i]["autobus"] ."</td>";
                echo "<td>". $rows[$i]["tren"] ."</td>";
                ?>
                <form action="resultado.php" method="post">
                <input type = "hidden" name = "origen" value = "<?php echo $rows[$i]['origen']?>" />
                <input type = "hidden" name = "destino" value = "<?php echo $rows[$i]['destino']?>" />
                <input type = "hidden" name = "fecha" value = "<?php echo $rows[$i]['fecha']?>" />
                <input type = "hidden" name = "autobus" value = "<?php echo $rows[$i]['autobus']?>" />
                <input type = "hidden" name = "tren" value = "<?php echo $rows[$i]['tren']?>" />
                <?php
            } elseif ($pagina=="rutas") {
                $ruta=$rows[$i]["ruta"];
                $query2="SELECT * FROM `rutas` WHERE `id_ruta`=$ruta";
                $sql2=$conexion->query($query2);
                $rowRuta = mysqli_fetch_assoc($sql2);
                echo "<td>". $rowRuta["lugar_salida"] ."-".$rowRuta["lugar_llegada"]." ". $rowRuta["medio"] ."</td>";
                echo "<td>". $rows[$i]["fecha"] ."</td>";
                ?>
                <form action="resultadorutas.php" method="post">
                <input type = "hidden" name = "fecha" value = "<?php echo $rows[$i]['fecha']?>" />
                <input type = "hidden" name = "ruta" value = "<?php echo $rows[$i]['ruta']?>" />
                <?php
            } elseif ($pagina=="paradas") {

                //var_dump($sql);
                if ($rows[$i]["origen"]!=NULL) {
                    echo "<td>". $rows[$i]["origen"] ."</td>";
                }
                if ($rows[$i]["destino"]!=NULL) {
                    echo "<td>". $rows[$i]["destino"]."</td>";
                }
                
                
                echo "<td>". $rows[$i]["parada"] ."</td>";
                echo "<td>". $rows[$i]["autobus"] ."</td>";
                echo "<td>". $rows[$i]["tren"] ."</td>";
                echo "<td>". $rows[$i]["fecha"] ."</td>";
                ?>
                <form action="resultadoparadas.php" method="post">

                <input type = "hidden" name = "fecha" value = "<?php echo $rows[$i]['fecha']?>" />
                <?php
                if ($rows[$i]["origen"]!=NULL) {
                    ?><input type = "hidden" name = "direccion" value = "<?php echo $rows[$i]['origen']?>" />
                <?php
                }
                if ($rows[$i]["destino"]!=NULL) {
                    ?><input type = "hidden" name = "direccion" value = "<?php echo $rows[$i]['destino']?>" />
                <?php
                }
                ?>
                
                
                <input type = "hidden" name = "parada" value = "<?php echo $rows[$i]['parada']?>" />
                <input type = "hidden" name = "autobus" value = "<?php echo $rows[$i]['autobus']?>" />
                <input type = "hidden" name = "tren" value = "<?php echo $rows[$i]['tren']?>" />
                <?php
            }
            ?>
            


            <td><input type="submit" class="btn btn-primary" value="REPETIR"></a></td>
        </form>
            <?php
            echo "</tr>";
        }
        ?>
        </table>
        
        
      </div>
    </div>

</div>