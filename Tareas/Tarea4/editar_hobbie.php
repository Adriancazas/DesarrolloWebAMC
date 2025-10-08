<?php
include "check_auth.php";
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    
    
    if (!empty($_FILES["fotografia"]["name"])) {
        $target_dir = "../image/hobbies/";
        $fotografia = basename($_FILES["fotografia"]["name"]);
        $target_file = $target_dir . $fotografia;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        /
        $check = getimagesize($_FILES["fotografia"]["tmp_name"]);
        if ($check === false) {
            echo "El archivo no es una imagen.";
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
            if (!move_uploaded_file($_FILES["fotografia"]["tmp_name"], $target_file)) {
                echo "Lo sentimos, hubo un error subiendo tu archivo.";
                $uploadOk = 0;
            }
        }
        
        if ($uploadOk == 1) {
            $sql = "UPDATE hobbies SET fotografia=?, nombre=?, descripcion=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $fotografia, $nombre, $descripcion, $id);
        }
    } else {
        $sql = "UPDATE hobbies SET nombre=?, descripcion=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $descripcion, $id);
    }
    
    if (isset($stmt) && $stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
?>