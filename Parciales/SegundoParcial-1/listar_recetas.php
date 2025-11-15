<?php
include 'conexion.php';

$tipo = $_GET['tipo'] ?? '';


if (!isset($_GET['tipo']) || empty($_GET['tipo'])) {
    echo '<div class="form-group">';
    echo '<label for="filtroTipo">Filtrar por tipo:</label>';
    echo '<select id="filtroTipo">';
    echo '<option value="">Todos</option>';
    
    $sqlTipos = "SELECT * FROM tiporeceta";
    $resultTipos = $conexion->query($sqlTipos);
    
    while ($tipoRow = $resultTipos->fetch_assoc()) {
        echo '<option value="' . $tipoRow['id'] . '">' . $tipoRow['tiporeceta'] . '</option>';
    }
    echo '</select>';
    echo '</div>';
}


$sql = "SELECT r.*, t.tiporeceta 
        FROM recetas r 
        JOIN tiporeceta t ON r.idtiporeceta = t.id";
        
if (!empty($tipo)) {
    $sql .= " WHERE r.idtiporeceta = $tipo";
}

$sql .= " ORDER BY r.id";

$result = $conexion->query($sql);

echo '<table class="tabla-recetas">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Foto</th>';
echo '<th>Título</th>';
echo '<th>Tipo</th>';
echo '<th>Preparación</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody id="tablaRecetas">';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $preparacionAbreviada = strlen($row['preparacion']) > 50 
            ? substr($row['preparacion'], 0, 50) . '...' 
            : $row['preparacion'];
            
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td><img src="images/' . $row['fotografia'] . '" class="miniatura"></td>';
        echo '<td>' . $row['titulo'] . '</td>';
        echo '<td>' . $row['tiporeceta'] . '</td>';
        echo '<td>' . $preparacionAbreviada . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No hay recetas disponibles.</td></tr>';
}

echo '</tbody>';
echo '</table>';

$conexion->close();
?>