<?php
include "check_auth.php";
include "db.php";

$sql = "SELECT id, fotografia, nombre, descripcion FROM hobbies";
$result = $conn->query($sql);

$hobbies = array();
while ($row = $result->fetch_assoc()) {
    $hobbies[] = $row;
}

echo json_encode($hobbies);
$conn->close();
?>