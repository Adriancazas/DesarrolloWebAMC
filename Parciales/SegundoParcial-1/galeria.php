<?php
include 'conexion.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT r.*, t.tiporeceta 
            FROM recetas r 
            JOIN tiporeceta t ON r.idtiporeceta = t.id 
            WHERE r.id = $id";
    $result = $conexion->query($sql);
    
    if ($result->num_rows > 0) {
        $receta = $result->fetch_assoc();
        
        
        $ingredientes = ["Sal", "Pimienta", "Aceite", "Cebolla", "Ajo"];
        
        echo '<img src="images/' . $receta['fotografia'] . '" class="imagen-modal">';
        echo '<h3>' . $receta['titulo'] . '</h3>';
        echo '<p><strong>Tipo:</strong> ' . $receta['tiporeceta'] . '</p>';
        echo '<p><strong>Preparación:</strong> ' . $receta['preparacion'] . '</p>';
        echo '<p><strong>Ingredientes:</strong></p>';
        echo '<ul>';
        foreach ($ingredientes as $ingrediente) {
            echo '<li>' . $ingrediente . '</li>';
        }
        echo '</ul>';
        echo '<button class="btnMenu" onclick="document.getElementById(\'modalGaleria\').style.display=\'none\'">Cerrar</button>';
    }
} else {
   
    $sql = "SELECT r.*, t.tiporeceta 
            FROM recetas r 
            JOIN tiporeceta t ON r.idtiporeceta = t.id 
            ORDER BY r.id";
    $result = $conexion->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<h3>Galería de Recetas</h3>';
        echo '<div class="galeria">';
        
        while ($row = $result->fetch_assoc()) {
            echo '<img src="images/' . $row['fotografia'] . '" 
                      class="miniatura" 
                      data-id="' . $row['id'] . '"
                      title="' . $row['titulo'] . '">';
        }
        
        echo '</div>';
    } else {
        echo '<p>No hay recetas disponibles.</p>';
    }
}

$conexion->close();
?>