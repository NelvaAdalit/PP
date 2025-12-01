<?php
include("conexion.php");
$sql2="SELECT id, tiporeceta FROM tiporeceta";
$result2=mysqli_query($con,$sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="javascript:crearReceta()" enctype="multipart/form-data" id="form_insertar" >
        <h2>DATOS DE LA RECETA</h2>
        <label for="fotografia">Fotografia: </label>
        <input type="file" name="fotografia" id="fotografia" >
        <br><br>
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo" id="titulo">
        <br><br>
        <label for="tiporeceta">Tipo Receta: </label>
        <select name="tiporeceta" id="tiporeceta">
            <?php
            while($fila=mysqli_fetch_assoc($result2)){
                ?>
                <option value="<?php  echo $fila['id'];?>"><?php  echo $fila['tiporeceta'];?></option>
                <?php
            }
            ?>
            
        </select>
        <br><br>
        <label for="preparacion">Preparacion: </label>
        <input type="textarea" id="preparacion" name="preparacion">
        <br><br>
        <input type="submit" value="INSERTAR RECETA">

    </form>
   
</body>
</html>