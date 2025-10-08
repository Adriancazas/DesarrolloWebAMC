<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero Generado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .tablero {
            display: inline-block;
            border: 2px solid #333;
            margin: 20px 0;
        }
        .fila {
            display: flex;
        }
        .casilla {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #999;
        }
        .casilla-especial {
            background-color: #FFC000 !important;
        }
        .imagen-especial {
            max-width: 40px;
            max-height: 40px;
        }
        .volver {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Tablero de Ajedrez Generado</h2>
    
    <?php
    
    $num_filas = $_POST['numerofilas'];
    $num_columnas = $_POST['numerocolumnas'];
    $fila_especial = $_POST['fila'];
    $columna_especial = $_POST['columna'];
    $color_tablero = $_POST['color'];
    
    echo "<p><strong>Configuración:</strong> $num_filas filas × $num_columnas columnas</p>";
    echo "<p><strong>Posición especial:</strong> Fila $fila_especial, Columna $columna_especial</p>";
    echo "<p><strong>Color del tablero:</strong> <span style='color:$color_tablero'>$color_tablero</span></p>";
    
    echo "<div class='tablero'>";
    
    for ($fila = 1; $fila <= $num_filas; $fila++) {
        echo "<div class='fila'>";
        
        for ($columna = 1; $columna <= $num_columnas; $columna++) {
            $es_especial = ($fila == $fila_especial && $columna == $columna_especial);
            
            // Alternar colores como tablero de ajedrez
            $color_fondo = (($fila + $columna) % 2 == 0) ? 'white' : $color_tablero;
            
            $clase_casilla = 'casilla';
            if ($es_especial) {
                $clase_casilla .= ' casilla-especial';
            }
            
            echo "<div class='$clase_casilla' style='background-color: $color_fondo;'>";
            
            if ($es_especial) {
                
                echo "<img src='400.png' alt='400 años' class='imagen-especial'>";
            }
            
            echo "</div>";
        }
        
        echo "</div>";
    }
    
    echo "</div>";
    ?>
    
    <div class="volver">
        <a href="pregunta2.html">← Generar otro tablero</a> | 
    </div>
    
</body>
</html>