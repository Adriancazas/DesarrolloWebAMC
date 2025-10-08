<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar palabras</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="container">
        <h2>Ingrese las palabras</h2>
        <form action="ordenar.php" method="post">
            <?php
            $cantidad = $_POST["cantidad"];
            for ($i = 1; $i <= $cantidad; $i++) {
                
                echo "<label for='palabra$i'>Palabra $i:</label><br>";
                echo "<input type='text' id='palabra$i' name='palabra$i'><br><br>";
            }
            ?>
            <input type="hidden" name="cantidad" value="<?php echo $cantidad; ?>">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
