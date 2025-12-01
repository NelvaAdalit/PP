<?php 
include("conexion.php");
$idr=$_GET['id'];
$sql="SELECT * FROM recetas WHERE id='$idr'";
$result=$con->query($sql);
$fila=$result->fetch_assoc();
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
    <form method="post" onsubmit="return actualizarReceta()" enctype="multipart/form-data" id="form_editar">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    
    <h2>Editar Receta</h2>
    <label for="fotografia">Fotografia: </label>
    <input type="file" name="fotografia" id="fotografia">
    <br><br>

    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo" id="titulo" value="<?php echo $fila['titulo']; ?>">
    <br><br>

    <label for="tiporeceta">Tipo Receta: </label>
    <select name="tiporeceta" id="tiporeceta">
        <?php while($fila2=mysqli_fetch_assoc($result2)){ ?>
            <option value="<?php echo $fila2['id']; ?>" 
                <?php if($fila2['id']==$fila['idtiporeceta']) echo "selected"; ?>>
                <?php echo $fila2['tiporeceta']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <label for="preparacion">Preparacion: </label>
    <textarea id="preparacion" name="preparacion"><?php echo $fila['preparacion']; ?></textarea>
    <br><br>

    <input type="submit" value="ACTUALIZAR RECETA">
</form>

    
</body>
</html>