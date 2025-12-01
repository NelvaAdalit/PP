<?php
include("conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM medicos WHERE id='$id'";
$result = $con->query($sql);
$fila = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post"  onsubmit="actualizarMedico()" id="formEditMedico">
    <label for="nombre">Nombre: </label>
     <input type="text" name="nombre" value="<?php echo $fila['nombre'] ;?>"   >
     
      
     <label for="especialidad">Especialidad: </label>
     <input type="text"  name="especialidad" value="<?php echo $fila['especialidad']; ?>" >
     
     <label for="telefono">Telefono: </label>
     <input type="text" value="<?php echo $fila['telefono']; ?>" name="telefono">
     
     <label for="correo">Correo: </label>
     <input type="text" value="<?php echo $fila['correo'];?>"  name="correo">
     
     <input type="hidden" name="id" value="<?php  echo $fila['id'];?>">
     <button type="submit" >Actualizar Medico</button>
    </form>
</body>
</html>