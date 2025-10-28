<?php
include("conexion.php");
$nro=$_POST["nro"];
$sql = "SELECT * from carreras";
$result = $con->query($sql);
$carreras = [];
while ($carrera = mysqli_fetch_array($result)) {
    $carreras[] = $carrera;
}
?>
<form style="border:3px solid #1c334e; background-color: #4f81bd; padding: 10px; margin-right: 120px;" action="listaAlumnos.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th></th>
            <th>Fotografia</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>CU</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>
        <?php for($i=0;$i<$nro;$i++){ ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td>
                    <input type="file" name="estudiantes[<?php echo $i; ?>][fotografia]">
                </td>
                <td>
                    <input type="text" name="estudiantes[<?php echo $i; ?>][nombres]">
                </td>
                <td>
                    <input type="text" name="estudiantes[<?php echo $i; ?>][apellidos]">
                </td>
                <td>
                    <input type="text" name="estudiantes[<?php echo $i; ?>][cu]">
                </td>
                <td>
                    <select name="estudiantes[<?php echo $i; ?>][sexo]">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </td>
                <td>
                    <select name="estudiantes[<?php echo $i; ?>][carrera]">
                        <?php foreach ($carreras as $carrera) { ?>
                            <option value="<?php echo $carrera['codigo']; ?>"><?php echo $carrera['carrera']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

        <?php } ?>
    </table>
    <button style="border: 2px solid #2e4f75; border-radius: 5px; margin-top: 15px; padding: 5px 10px;" type="submit">Insertar</button>
    <button style="border: 2px solid #f44336; border-radius: 5px; margin-top: 15px; padding: 5px 10px;" type="reset">Borrar</button>
</form>