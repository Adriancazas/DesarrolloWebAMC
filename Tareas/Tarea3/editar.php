<?php
include "db.php";

$id = $_GET["id"];
$sql = "SELECT * FROM amigos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Amigo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Editar Amigo</h1>
    <form method="post">
        <table>
            <tr><td>Nombres:</td><td><input type="text" name="nombres" value="<?= $row['nombres'] ?>" required></td></tr>
            <tr><td>Apellidos:</td><td><input type="text" name="apellidos" value="<?= $row['apellidos'] ?>" required></td></tr>
            <tr><td>Celular:</td><td><input type="text" name="celular" value="<?= $row['celular'] ?>" required></td></tr>
            <tr><td>Correo:</td><td><input type="email" name="correo" value="<?= $row['correo'] ?>" required></td></tr>
            <tr><td colspan="2"><button type="submit">Actualizar</button></td></tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $celular = $_POST["celular"];
        $correo = $_POST["correo"];

        $sql = "UPDATE amigos SET 
                    nombres='$nombres',
                    apellidos='$apellidos',
                    celular='$celular',
                    correo='$correo'
                WHERE id=$id";
        if ($conn->query($sql)) {
            header("Location: misamigos.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

</body>
</html>
