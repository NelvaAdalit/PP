<?php
include('conexion.php');
$sql="SELECT *FROM  libros";
$resultado=mysqli_query($conexion,$sql);
while($fila=mysqli_fetch_assoc($resultado)){
?>

<img  style="width:50px; height:75px; margin-left:10px;" onclick="javascript:cargarimagen('<?php echo $fila['imagen']; ?>')" src="imagenes/<?php echo $fila['imagen'];?>">
<?php
}
?>


