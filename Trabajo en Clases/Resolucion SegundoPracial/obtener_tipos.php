<?php
include 'conexion.php';

$sql = "SELECT id, tiporeceta FROM tiporeceta";
$resultado = $conexion->query($sql);

$tipos = array();
while($fila = $resultado->fetch_assoc()) {
    $tipos[] = $fila;
}

echo json_encode($tipos);
$conexion->close();
?>