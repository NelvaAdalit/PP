<?php
session_start();
include("proteger.php");
include("conexion.php");
$id=$_GET['id'];
$sql="DELETE FROM hobbies WHERE id=?";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("i",$id);
if($stmt->execute()){
    echo "Registro Eliminado";
}
?>
<meta http-equiv="refresh" content="2;url=leer.php">