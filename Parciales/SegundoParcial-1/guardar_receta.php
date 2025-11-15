<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "", "bd_recetas");

if ($conexion->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Error de conexión']));
}

$titulo = $_POST['titulo'];
$tipoReceta = $_POST['tipoReceta'];
$preparacion = $_POST['preparacion'];
$imagen = $_POST['imagen'];

$sql = "INSERT INTO recetas (fotografia, titulo, idtiporeceta, preparacion) 
        VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssis", $imagen, $titulo, $tipoReceta, $preparacion);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Receta guardada']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al guardar']);
}

$stmt->close();
$conexion->close();
?>