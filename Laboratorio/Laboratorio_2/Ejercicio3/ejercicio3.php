<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de números primos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="numerosPrimos">
        <h2>Generador de numeros primos</h2>
        <form action="calcularprimos.php" method="post">
            <label for="cantidad">Ingrese la cantidad de números primos a generar:</label><br>
            <input type="number" name="cantidad"><br><br>
            <input type="submit" value="Generar">
        </form>
    </div>
</body>
</html>

