<?php
$host = "localhost";
$user = "root"; // usuario por defecto de XAMPP
$pass = "";     // si tienes contraseña cámbiala aquí
$db   = "tarea3";

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
