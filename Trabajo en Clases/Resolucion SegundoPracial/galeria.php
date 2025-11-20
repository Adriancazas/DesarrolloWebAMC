<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_recetas";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT r.*, t.tiporeceta 
            FROM recetas r 
            INNER JOIN tiporeceta t ON r.idtiporeceta = t.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $recetas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

<div id="principal">
    <h2>Galería de Recetas</h2>
    
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-top: 20px;">
        <?php foreach($recetas as $receta): ?>
            <?php
           
            $ingredientesFicticios = [
                "500g de ingrediente principal",
                "2 cucharadas de aceite de oliva",
                "1 cebolla picada",
                "2 dientes de ajo",
                "Sal y pimienta al gusto"
            ];
            ?>
            
            <div style="text-align: center; cursor: pointer;" 
                 onclick="abrirModal(<?php echo htmlspecialchars(json_encode([
                     'fotografia' => $receta['fotografia'],
                     'titulo' => $receta['titulo'],
                     'tiporeceta' => $receta['tiporeceta'],
                     'preparacion' => $receta['preparacion'],
                     'ingredientes' => $ingredientesFicticios
                 ]), ENT_QUOTES, 'UTF-8'); ?>)">
                
                <img src="images/<?php echo $receta['fotografia']; ?>" 
                     alt="<?php echo $receta['titulo']; ?>"
                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px; border: 2px solid #1a73e8;">
                
                <p style="margin: 5px 0; font-size: 12px; font-weight: bold;">
                    <?php echo $receta['titulo']; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div id="vista">
    <p style="text-align: center; margin-top: 20px; color: #666;">
        Seleccione una imagen para mas información del platillo
    </p>
</div>