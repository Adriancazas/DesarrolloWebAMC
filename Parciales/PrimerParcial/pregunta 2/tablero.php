<?php

$numfilas = $_POST['numfilas'];
$numcolumnas = $_POST['numcolumnas'];
$fila = $_POST['fila'];
$columna = $_POST['columna'];
$color = $_POST['color'];

echo $numfilas . " - " . $numcolumnas . " - " . $fila . " - " . $columna . " - " . $color;

?>

<style>
    .bordes {
        background-color: <?php echo $color; ?>;
    }
    .bordes2 {
        background-color: #FFC000;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<table style="border-collapse: colapse; border: 1px solid black">
    <?php
    for($i=0; $i<$numfilas; $i++)
    {
        ?>
        <tr>
            <?php
            for($j=0; $j<$numcolumnas; $j++) {
                ?>
                <td style="width: 100px; height: 50px;"
                <?php
                if($i==$fila-1 && $j==$columna-1) {
                    ?> class="bordes2" <?php
                } elseif(($i+$j)%2 == 0) {
                    ?> class="bordes" <?php
                }
                ?>
                ><?php
                if($i==$fila-1 && $j==$columna-1){
                    ?>
                    <img src="../Bowser.png" width="50px">
                    <?php
                }
                ?></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>