<?php//consultar li
include('conexion.php');
$resultado = $conexion->query("SELECT id, imagen, titulo, autor, anio FROM libros ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1200px; margin: 20px auto; padding: 20px; }
        .libros-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin: 20px 0; }
        .libro-card { border: 2px solid #0070C0; padding: 15px; border-radius: 8px; }
        .libro-imagen { width: 100%; height: 180px; object-fit: cover; border-radius: 5px; }
        .sin-imagen { width: 100%; height: 180px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px dashed #ccc; border-radius: 5px; color: #6c757d; }
        .libro-titulo { font-size: 16px; font-weight: bold; color: #0070C0; margin: 10px 0; }
        .libro-detalle { margin: 5px 0; color: #555; }
        .total-libros { background: #0070C0; color: white; padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align: center; }
        .volver { margin-top: 30px; text-align: center; }
        .btn { padding: 10px 20px; background: #0070C0; color: white; text-decoration: none; border-radius: 5px; display: inline-block; margin: 5px; }
    </style>
</head>
<body>
    <h2> Lista de Libros</h2>
    
    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <div class='total-libros'>Total de libros: <?php echo $resultado->num_rows; ?></div>
        
        <div class="libros-grid"
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <div class="libro-card">
                    <?php if (!empty($fila['imagen']) && $fila['imagen'] != 'default.jpg'): ?>
                        <img src='../images/<?php echo $fila['imagen']; ?>' class='libro-imagen'>
                    <?php else: ?>
                        <div class='sin-imagen'>Sin Imagen</div>
                    <?php endif; ?>
                    
                    <div class='libro-titulo'><?php echo $fila['titulo']; ?></div>
                    <div class='libro-detalle'><strong>Autor:</strong> <?php echo $fila['autor']; ?></div>
                    <div class='libro-detalle'><strong>Año:</strong> <?php echo $fila['anio']; ?></div>
                    <div class='libro-detalle'><strong>ID:</strong> #<?php echo $fila['id']; ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No hay libros registrados.</p>
    <?php endif; ?>
    
    <?php $conexion->close(); ?>
    
    <div class="volver">
        <a href="formulario.html" class="btn"> Registrar Nuevos Libros</a>
        
    </div>
</body>
</html>