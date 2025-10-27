<?php
include("conexion.php");
if (isset($_POST['estudiantes'])) {
    $estudiantes = $_POST['estudiantes'];
    
    foreach ($estudiantes as $index => $estudiante) {
        $nombres = $estudiante['nombres'];
        $apellidos = $estudiante['apellidos'];
        $sexo = $estudiante['sexo'];
        $cu = $estudiante['cu'];
        $carrera = $estudiante['carrera'];
        
        $nombreFoto = '';
        
        if (isset($_FILES['estudiantes']['name'][$index]['fotografia']))
        {
            $nombre_archivo=$_FILES['estudiantes']['name'][$index]['fotografia'];
            $nombre_temporal=$_FILES['estudiantes']['tmp_name'][$index]['fotografia'];
            $extension = explode(".", $nombre_archivo);
            $nombre_nuevo=uniqid().".".end($extension);
            copy($nombre_temporal, "images/".$nombre_nuevo);
            $nombreFoto = $nombre_nuevo;
        }
        
        $sql = "INSERT INTO alumnos (fotografia, nombres, apellidos, cu, sexo, codigocarrera) 
                VALUES('$nombreFoto', '$nombres', '$apellidos', '$cu', '$sexo', $carrera)";
        $con->query($sql);
    }
}

$sql = "SELECT a.*, c.carrera 
        FROM alumnos a
        LEFT JOIN carreras c ON a.codigocarrera = c.codigo";
$result = $con->query($sql);
?>

<table border="2" style="border-collapse: collapse;">
    <tr>
        <th style="background-color:#d9d9d9; width: 50px;">Nro</th>
        <th style="background-color:#d9d9d9; width: 80px;">Foto</th>
        <th style="background-color:#d9d9d9; width: 150px;">Nombres</th>
        <th style="background-color:#d9d9d9; width: 150px;">Apellidos</th>
        <th style="background-color:#d9d9d9; width: 100px;">CU</th>
        <th style="background-color:#d9d9d9; width: 80px;">Sexo</th>
        <th style="background-color:#d9d9d9;">Carrera</th>
    </tr>
    <?php
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        $foto = $row['fotografia'];
        if (!empty($foto) && file_exists('images/' . $foto)) {
            $rutaFoto = 'images/' . $foto;
        } else {
            $rutaFoto = 'images/no-photo.png';
        }
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><img src="<?php echo $rutaFoto; ?>" width="80"></td>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['apellidos']; ?></td>
            <td><?php echo $row['cu']; ?></td>
            <td><?php echo $row['sexo']; ?></td>
            <td><?php echo $row['carrera']; ?></td>
        </tr>
    <?php
        $i++;
    }
    ?>
</table>

<br>
<a href="Fintroduccion.html">Insertar más alumnos</a>

<?php $con->close(); ?>