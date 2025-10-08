<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números primos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="numerosPrimos">
        <h2>Los numeros primos generados son:</h2> <br>
        <ul>
            <?php
            function esPrimo($numero)
            {
                if ($numero <= 1) {
                    return false;
                }
                for ($i = 2; $i <= sqrt($numero); $i++) {
                    if ($numero % $i == 0) {
                        return false;
                    }
                }
                return true;
            }

            $cantidad = $_POST["cantidad"];
            $contador = 0;
            $numero = 2;
            while ($contador < $cantidad) {
                if (esPrimo($numero)) {
                    echo "<li>$numero</li>";
                    $contador++;
                }
                $numero++;
            }

            ?>
        </ul>
    </div>
</body>

</html>