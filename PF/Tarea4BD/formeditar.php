<?php include("proteger.php");
if(!isset($_SESSION['correo'])){
    header("Location:login.php");
    exit();
}

include("conexion.php");

$id=$_GET['id'];
$sql="SELECT id, nombres, descripcion, frecuencia, fotografia from hobbies where id=?";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$resul=$stmt->get_result();
$row=$resul->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormEditar</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body> 
    
    <form action="editar.php" method="post" enctype="multipart/form-data">
        <h1>EDITA EL FORMULARIO</h1>
      <label for="fotografia">Fotografía: </label>
      <img width="100px" src="imagenes/<?php echo $row['fotografia'];?>">
      <input type="file" name="fotografia">
      <br>
      <label for="nombres">Nombres del hobby:</label>
      <input type="text" name="nombres" value=<?php echo $row['nombres'];?>
      <br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" rows="6" cols="50"><?php echo $row['descripcion'];?></textarea>
    <br>
        <label for="frecuencia">Frecuencia:</label>
        <input type="text" name="frecuencia" value="<?php echo $row['frecuencia'];?>" >
        <br>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input  type="submit" value="Actualizar">
        <a href="leer.php">Cancelar</a>
    </form>
</body>
</html>