<?php
include ("conexion.php");
$sql2="SELECT id,tiporeceta FROM tiporeceta";
$result2=mysqli_query($conexion,$sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="javascript:crear()" id="form_recetas">
      <h2>INSERTAR NUEVA RECETA</h2>
         <label for="fotografia">Imagen</label>
       <input type="text" id="fotografia" name="fotografia">
       <br>
       <label for="titulo">Titulo  receta</label> 
       <input type="text" name="titulo" id="titulo">
       <br>
       <label for="tiporeceta">Selecciona Tipo Receta</label>
       <select name="tiporeceta">
         <?php
         while($fila=mysqli_fetch_assoc($result2)) {
            ?>
            <option  value="<?php echo $fila['id'];?>"><?php echo $fila['tiporeceta'];?></option>
         <?php
         }
         ?>
       </select>
       <br>
        <label for="preparacion">Preparacion</label>
       <input type="textarea" name="preparacion" id="preparacion">
       <br>
       <input type="submit" value="Guardar">
    </form>
</body>
</html>