
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conversiones de temperatura</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php


$temperatura = $_POST["temp"];
$unidadcita = $_POST["unidad"];

function celsiusAFahrenheit($celsius)
{
    return ($celsius * 9 / 5) + 32;
}

function celsiusAKelvin($celsius)
{
    return $celsius + 273.15;
}

function fahrenheitACelsius($fahrenheit)
{
    return ($fahrenheit - 32) * 5 / 9;
}

function fahrenheitAKelvin($fahrenheit)
{
    return ($fahrenheit + 459.67) * 5 / 9;
}

function kelvinACelsius($kelvin)
{
    return $kelvin - 273.15;
}

function kelvinAFahrenheit($kelvin)
{
    return ($kelvin * 9 / 5) - 459.67;
}

?>
<br>
<div class="tableContainer">
<h2>Conversiones</h2>
<br>
<table>
<tr><th>Unidad</th><th>Temperatura</th></tr>

<?php

switch ($unidadcita) {
    case 'celsius':
        echo "<tr><td>Celsius (°C)</td><td>$temperatura</td></tr>";
        echo "<tr><td>Fahrenheit (°F)</td><td>" . celsiusAFahrenheit($temperatura) . "</td></tr>";
        echo "<tr><td>Kelvin (K)</td><td>" . celsiusAKelvin($temperatura) . "</td></tr>";
        break;
    case 'Fahrenheit':
        echo "<tr><td>Fahrenheit (°F)</td><td>$temperatura</td></tr>";
        echo "<tr><td>Celsius (°C)</td><td>" . fahrenheitACelsius($temperatura) . "</td></tr>";
        echo "<tr><td>Kelvin (K)</td><td>" . fahrenheitAKelvin($temperatura) . "</td></tr>";
        break;
    case 'kelvin':
        echo "<tr><td>Kelvin (K)</td><td>$temperatura</td></tr>";
        echo "<tr><td>Celsius (°C)</td><td>" . kelvinACelsius($temperatura) . "</td></tr>";
        echo "<tr><td>Fahrenheit (°F)</td><td>" . kelvinAFahrenheit($temperatura) . "</td></tr>";
        break;
    default:
        echo "Unidad de temperatura no válida.";
}
?>
</table>
</div>
   
</body>
</html>
