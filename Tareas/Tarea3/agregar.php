<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Amigo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Agregar Amigo</h1>
    <form method="post">
        <table>
            <tr><td>Nombres:</td><td><input type="text" name="nombres" required></td></tr>
            <tr><td>Apellidos:</td><td><input type="text" name="apellidos" required></td></tr>
            <tr><td>Celular:</td><td><input type="text" name="celular" required></td></tr>
            <tr><td>Correo:</td><td><input type="email" name="correo" required></td></tr>
            <tr><td colspan="2"><button type="submit">Guardar</button></td></tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $celular = $_POST["celular"];
        $correo = $_POST["correo"];

        $sql = "INSERT INTO amigos (nombres, apellidos, celular, correo)
                VALUES ('$nombres', '$apellidos', '$celular', '$correo')";
        if ($conn->query($sql)) {
            header("Location: misamigos.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

</body>
</html>
