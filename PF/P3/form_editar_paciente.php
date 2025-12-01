<?php
include("conexion.php");

$id=$_GET['id'];
$sql="SELECT * FROM pacientes WHERE id='$id'";
$result=$con->query($sql);
$fila=$result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Actualizar Datos Paciente</h2>
    <form method="post" onsubmit=" return actualizarPaciente()" id="actualizarP">
        <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>">
            <br><br>
        <label for="documento">Documento: </label>
            <input type="text" name="documento" value="<?php echo $fila['documento']; ?>">
            <br><br>
        <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>">
            <br><br>
        <label for="correo">Correo: </label>
            <input type="text" name="correo" value="<?php echo $fila['correo']; ?>">
            <br><br>
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
        <button type="submit">Actualizar Paciente</button>

    </form>
</body>
</html>