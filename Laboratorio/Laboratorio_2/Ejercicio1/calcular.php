<?php

$numero = $_POST['numero'];

$suma = 0;

$longitud = strlen($numero);
if ($numero > 0) {
    
    for ($i = 0; $i < $longitud; $i++) {
        $suma += $numero[$i];
    }


    echo "<br>La suma los digitos del numero $numero es: $suma";
} else {

    echo "<br>Ingrese un número entero positivo.";
}
