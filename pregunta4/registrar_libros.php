<?php
include('conexion.php');
//verifica
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libros_registrados = array();
    
    // Procesar ambos libros
    for ($i = 1; $i <= 2; $i++) {
        if (!empty($_POST["titulo$i"])) {
            $imagen = "default.jpg";
            $titulo = trim($_POST["titulo$i"]);
            $autor = trim($_POST["autor$i"]);
            $editorial = trim($_POST["editorial$i"]);
            $anio = $_POST["anio$i"];
            
            // Procesar imagen - CORREGIDO
            if (isset($_FILES["imagen$i"]) && $_FILES["imagen$i"]['error'] == 0) {
                $imagen = time() . "_" . $i . "_" . $_FILES["imagen$i"]['name']; // CORRECCIÓN AQUÍ
                $target_dir = "../images/";
                if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                move_uploaded_file($_FILES["imagen$i"]['tmp_name'], $target_dir . $imagen);
            }
            
            // Insertar en BD
            $sql = "INSERT INTO libros (imagen, titulo, autor, ideditorial, anio, idusuario, idcarrera) 
                    VALUES ('$imagen', '$titulo', '$autor', 1, $anio, 1, 35)";
            
            if ($conexion->query($sql) === TRUE) {
                $libros_registrados[] = array('titulo' => $titulo, 'autor' => $autor, 'anio' => $anio, 'imagen' => $imagen);
            }
        }
    }
    
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Registro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; padding: 20px; }
        .mensaje { padding: 15px; margin: 10px 0; border-radius: 5px; }
        .exito { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .libros-container { display: flex; flex-direction: column; gap: 15px; margin: 20px 0; }
        .libro-item { display: flex; align-items: center; gap: 20px; padding: 15px; background: white; border-radius: 8px; border-left: 4px solid #0070C0; }
        .libro-imagen { width: 80px; height: 100px; object-fit: cover; border-radius: 5px; border: 1px solid #ddd; }
        .sin-imagen { width: 80px; height: 100px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px dashed #ccc; border-radius: 5px; color: #6c757d; font-size: 12px; }
        .libro-info { flex: 1; }
        .btn { padding: 10px 20px; background-color: #0070C0; color: white; text-decoration: none; border-radius: 5px; display: inline-block; margin: 5px; }
        .btn:hover { background-color: #00509E; }
        .volver { margin-top: 20px; text-align: center; }
    </style>
</head>
<body>
    <h2>Resultado del Registro</h2>
    
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <?php if (!empty($libros_registrados)): ?>
            <div class='mensaje exito'>✅ Se registraron <?php echo count($libros_registrados); ?> libro(s) correctamente</div>
            
            <div class="libros-container">
                <?php foreach ($libros_registrados as $index => $libro): ?>
                    <div class='libro-item'>
                        <?php if ($libro['imagen'] != 'default.jpg'): ?>
                            <img src='../images/<?php echo $libro['imagen']; ?>' class='libro-imagen'>
                        <?php else: ?>
                            <div class='sin-imagen'>Sin imagen</div>
                        <?php endif; ?>
                        
                        <div class='libro-info'>
                            <strong>Libro <?php echo $index + 1; ?>:</strong> <?php echo $libro['titulo']; ?><br>
                            <strong>Autor:</strong> <?php echo $libro['autor']; ?><br>
                            <strong>Año:</strong> <?php echo $libro['anio']; ?><br>
                            <?php if ($libro['imagen'] != 'default.jpg'): ?>
                                <strong>Imagen:</strong> <?php echo $libro['imagen']; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class='mensaje error'>❌ No se registraron libros</div>
        <?php endif; ?>
    <?php else: ?>
        <div class='mensaje error'>❌ No se recibieron datos</div>
    <?php endif; ?>
    
    <div class="volver">
        <a href="listar_libros.php" class="btn">📖 Ver Todos los Libros</a>
        <a href="formulario.html" class="btn">📝 Registrar Más Libros</a>
    </div>
</body>
</html>