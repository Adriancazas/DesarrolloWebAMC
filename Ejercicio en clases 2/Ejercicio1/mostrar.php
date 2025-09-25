<?php
$nombres   = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$sexo      = $_POST['sexo'];
$direccion = $_POST['direccion'];
$celular   = $_POST['celular'];
$correo    = $_POST['correo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Datos del Cliente</h2>
        <div class="grid">
            <div class="item color1">Nombres: <?php echo $nombres; ?></div>
            <div class="item color2">Apellidos: <?php echo $apellidos; ?></div>
            <div class="item color3">Sexo: <?php echo $sexo; ?></div>
            <div class="item color4">Dirección: <?php echo $direccion; ?></div>
            <div class="item color5">Celular: <?php echo $celular; ?></div>
            <div class="item color6">Correo: <?php echo $correo; ?></div>
        </div>
    </div>
</body>
</html>
