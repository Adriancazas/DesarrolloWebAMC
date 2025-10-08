<?php
include "check_auth.php";
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    
    
    $target_dir = "../image/hobbies/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $fotografia = basename($_FILES["fotografia"]["name"]);
    $target_file = $target_dir . $fotografia;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
   
    $check = getimagesize($_FILES["fotografia"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
    
    
    if (file_exists($target_file)) {
        echo "Lo sentimos, el archivo ya existe.";
        $uploadOk = 0;
    }
    
   
    if ($_FILES["fotografia"]["size"] > 500000) {
        echo "Lo sentimos, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }
    
    
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }
    
   
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fotografia"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO hobbies (fotografia, nombre, descripcion) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $fotografia, $nombre, $descripcion);
            
            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $stmt->close();
        } else {
            echo "Lo sentimos, hubo un error subiendo tu archivo.";
        }
    }
    
    $conn->close();
}
?>