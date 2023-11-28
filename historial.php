<div>
    <div class="card text-start col-12 col-md-6">
      
      <div class="card-body">
        <h4 class="card-title">Historial</h4>
        <p class="card-text">Body</p>
        <?php
        $id=$_SESSION["id"];
        $query="SELECT * FROM `historial` WHERE `origen` IS not null AND `destino` IS not null AND `id_usuario`=$id order BY `id` desc;";
        $sql=$conexion->query($query);
        //var_dump($sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($sql)) {
        array_push($rows, $row);
    
        }
        ?>
        
        <table class="table table-stripped">
        <?php
        for ($i=0; $i < count($rows); $i++) { 
            echo "<tr>";
            echo "<td>". "-" ."</td>";
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
            <td><input type="submit" class="btn btn-primary" value="REPETIR"></a></td>
        </form>
            <?php
            echo "</tr>";
        }
        ?>
        </table>
        
        
      </div>
    </div>
<h6>Historial</h6>
</div>