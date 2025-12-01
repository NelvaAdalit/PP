<?php
include("proteger.php");
include("conexion.php");
$nombres=$_POST['nombres'];
$descripcion=$_POST['descripcion'];
$frecuencia=$_POST['frecuencia'];

if(isset($_FILES['fotografia']['name'])){
    $nombre_archivo=$_FILES['fotografia']['name'];
    $nombre_temporal=$_FILES['fotografia']['tmp_name'];
    $extension=explode(".",$nombre_archivo);
    $nombre_nuevo=uniqid().".".end($extension);
    copy($nombre_temporal, "imagenes/".$nombre_nuevo);
}
$sql="INSERT INTO hobbies(nombres,descripcion,frecuencia,fotografia) VALUES(?,?,?,?)";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("ssss",$nombres,$descripcion,$frecuencia,$nombre_nuevo);
if($stmt->execute()){
    echo "REGISTRO EXITOSO";
}
?>
<meta http-equiv="refresh" content="2;url=leer.php">