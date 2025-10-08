<?php
include "db.php";

$id = $_GET["id"];
$sql = "DELETE FROM amigos WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: misamigos.php");
} else {
    echo "Error: " . $conn->error;
}
?>
