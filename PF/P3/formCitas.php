<?php
include("conexion.php");
$sql_medicos="SELECT id,nombre FROM medicos ORDER BY nombre";
$result_medicos=$con->query($sql_medicos);

$sql_pacientes="SELECT id,nombre FROM pacientes ORDER BY nombre";
$result_pacientes=$con->query($sql_pacientes);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="form_insertar_cita" onsubmit="registrarCita(); return false;" method="post">
        <h2>REGISTRAR NUEVA CITA</h2>
        <label for="id_medico">Medico: </label>
        <select name="id_medico" id="id_medico">
            <?php
            while ($filam=$result_medicos->fetch_assoc()) {
            ?>
                <option value="<?php echo $filam['id']; ?>"><?php echo $filam['nombre']?></option>
            <?php
            }
            ?>
        </select>
        <br><br>
        <label for="id_paciente">Paciente: </label>
        <select name="id_paciente" id="id_paciente">
            <?php
            while($filap=$result_pacientes->fetch_assoc()){
                ?>
                <option value="<?php  echo $filap['id'];?>"><?php echo $filap['nombre'];?></option>
                <?php
            }
            ?>
        </select>
        <br><br>
        <label for="fecha_cita">Fecha: </label>
        <input type="date" name="fecha_cita">
        <br><br>
        <label for="hora_cita">Hora: </label>
        <input type="time"  name="hora_cita" id="hora_cita">
        <br><br>
        <label for="motivo">Motivo: </label>
        <input type="text" id="motivo" name="motivo">
        <br><br>
        <input type="submit" value="Registrar Cita">
    </form>
</body>
</html>