<?php 
include("proteger.php");
include ("conexion.php");
if(!isset($_SESSION['correo'])){
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormInsertar</title>
    <link rel="stylesheet" href="insertar.css">
</head>
<body>
    
    <form action="insertar.php" method="post" enctype="multipart/form-data">
        <h1>Agregar Nuevo Hobby</h1>
      <label for="fotografia">Fotografía: </label>
      <input type="file" name="fotografia">
      <br>
      <label for="nombres">Nombres del hobby:</label>
      <input type="text" name="nombres">
      <br>
      <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <br>
        <label for="frecuencia">Frecuencia:</label>
        <input type="text" name="frecuencia" required>
        <br>
        <input type="submit" value="Registrar">
        <a href="leer.php">Cancelar</a>
    </form>
</body>
</html>