<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_recetas";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $titulo = $_POST['titulo'] ?? '';
    $idtiporeceta = $_POST['idtiporeceta'] ?? '';
    $preparacion = $_POST['preparacion'] ?? '';
    
    $fotografia = '';
    if (isset($_FILES['fotografia']) && $_FILES['fotografia']['error'] === 0) {
        $fotografia = $_FILES['fotografia']['name'];
        $temp_path = $_FILES['fotografia']['tmp_name'];
        $destination = 'images/' . $fotografia;
        
        if (!move_uploaded_file($temp_path, $destination)) {
            throw new Exception("Error al subir la imagen");
        }
    }
    
    $sql = "INSERT INTO recetas (fotografia, titulo, idtiporeceta, preparacion) 
            VALUES (:fotografia, :titulo, :idtiporeceta, :preparacion)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fotografia', $fotografia);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':idtiporeceta', $idtiporeceta);
    $stmt->bindParam(':preparacion', $preparacion);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Receta guardada correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al guardar en la base de datos']);
    }
    
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error de base de datos: ' . $e->getMessage()]);
} catch(Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>