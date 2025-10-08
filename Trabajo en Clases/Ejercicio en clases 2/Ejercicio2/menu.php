<?php
include("Prueba.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $color = $_POST['color'];
    $color_fondo = $_POST['color_fondo'];
    $imagen = $_FILES['imagen']['name'];

 
    move_uploaded_file($_FILES['imagen']['tmp_name'], "imagenes/" . $imagen);

    $obj = new Prueba($item, $color, $color_fondo, $imagen);

    if (isset($_POST['cuadrado'])) {
        $obj->cuadrado();
    } elseif (isset($_POST['diagonal'])) {
        $obj->diagonal();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Prueba</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Clase Prueba</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="formulario">
            <label>Item:</label>
            <input type="text" name="item" required>

            <label>Color Texto:</label>
            <input type="text" name="color" placeholder="ej: white" required>

            <label>Color Fondo:</label>
            <input type="text" name="color_fondo" placeholder="ej: red" required>

            <label>Imagen:</label>
            <input type="file" name="imagen" accept="image/*" required>

            <div class="botones">
                <button type="submit" name="cuadrado">Mostrar Cuadrado</button>
                <button type="submit" name="diagonal">Mostrar Diagonal</button>
            </div>
        </form>
    </div>
</body>
</html>
