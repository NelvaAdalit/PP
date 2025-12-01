<?php

include("conexion.php");

$fotografia=$_POST['fotografia'];
$titulo=$_POST['titulo'];
$tiporeceta=$_POST['tiporeceta'];
$preparacion=$_POST['preparacion'];

$stmt=$conexion->prepare('INSERT INTO recetas (fotografia,titulo,idtiporeceta,preparacion) VALUES (?,?,?,?)');
$stmt->bind_param("ssis", $fotografia,$titulo, $tiporeceta, $preparacion);

if($stmt->execute()){
    echo "Nueva receta registrada";
}else{
    echo "Error: ".$stmt->error;
}

$stmt->close();
$conexion->close();

?>