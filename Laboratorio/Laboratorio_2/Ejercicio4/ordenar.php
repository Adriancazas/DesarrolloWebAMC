<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" href="styles.css">
   
</head>
<body>
    <div class="containerOrd">
        <h2>Palabras ordenadas alfabéticamente:</h2>
        <ul>
            <?php
            function ordenarPalabras($palabras) {
                sort($palabras);
                return $palabras;
            }

            $cantidad = $_POST["cantidad"];
            $palabras = array();
            for ($i = 1; $i <= $cantidad; $i++) {
                $palabras[] = $_POST["palabra$i"];
            }

            $palabrasOrdenadas = ordenarPalabras($palabras);
            foreach ($palabrasOrdenadas as $palabra) {
                echo "<li>$palabra</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
