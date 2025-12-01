<?php
include("conexion.php");
$sql="SELECT r.id,r.fotografia,r.titulo,r.preparacion,t.tiporeceta as tipore
FROM recetas r LEFT JOIN tiporeceta t ON r.idtiporeceta=t.id ORDER BY r.id";
$result= mysqli_query($conexion,$sql);
?>
<div style="display:grid; grid-template-columns:auto auto auto; gap:3px">
<?php
 while($fila=mysqli_fetch_assoc($result)){
?> 
 <div style="text-align:center;">
 <img onclick="modalImagen('images/<?php echo $fila['fotografia'];?>','<?php echo $fila['titulo'];?>','<?php echo $fila['tipore'];?>')"  
 src="images/<?php echo $fila['fotografia'];?>"
  style="width:120px;height:120px;">
   <span style="display:block; margin-top:5px; font-weight:bold;"><?php echo $fila['titulo'];?></span>
   </div>
<?php
 }
?>
</div>




