<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabra en Diagonal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            text-align: center;
        }
        .resultado {
            margin: 30px 0;
            display: flex;
            justify-content: center;
        }
        .volver {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h2>Palabra Mostrada en Diagonal</h2>
    
    <?php

    include 'Pizarra.php';
    
    if ($_POST) {
       
        $palabra = $_POST['palabra'];
        $color = $_POST['color'];
        $color_fondo = $_POST['color_fondo'];
        
        
        $pizarra = new Pizarra($palabra, $color, $color_fondo);
       
        echo "<p><strong>Palabra:</strong> $palabra</p>";
        echo "<p><strong>Color texto:</strong> <span style='color:$color'>$color</span></p>";
        echo "<p><strong>Color fondo:</strong> <span style='color:$color_fondo'>$color_fondo</span></p>";
        //mues res
        echo "<div class='resultado'>";
        echo $pizarra->diagonal();
        echo "</div>";
        
    } else {
       
        $pizarra = new Pizarra("parcial", "blue", "yellow");
        
        echo "<p><strong>Ejemplo por defecto:</strong></p>";
        echo "<div class='resultado'>";
        echo $pizarra->diagonal();
        echo "</div>";
    }
    ?>
    
    <div class="volver">
        <a href="palabra.html">← Introducir otra palabra</a> | 
        <a href="pizarra.html">← Volver al Menú Pizarra</a> |
   
    </div>
</body>
</html>