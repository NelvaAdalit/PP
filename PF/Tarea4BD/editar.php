<?php
 include("proteger.php");
include("conexion.php");

$id = $_POST['id'];
$nombres=$_POST['nombres'];
$descripcion=$_POST['descripcion'];
$frecuencia=$_POST['frecuencia'];

if(isset($_FILES['fotografia']['name'])){
    $nombre_archivo=$_FILES['fotografia']['name'];
    $nombre_temporal=$_FILES['fotografia']['tmp_name'];
    $extension=explode(".",$nombre_archivo);
    $nombre_nuevo=uniqid().".".end($extension);
    copy($nombre_temporal,"imagenes/".$nombre_nuevo);
}
$sql="UPDATE hobbies SET nombres=?,descripcion=?,frecuencia=?,fotografia=? WHERE id=?";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("ssssi",$nombres,$descripcion,$frecuencia,$nombre_nuevo,$id);
if($stmt->execute()){
    echo "Registro Actualizado";
}
?>
<meta http-equiv="refresh" content="2;url=leer.php">