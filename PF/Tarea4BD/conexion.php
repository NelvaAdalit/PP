<?php
$conexion=new mysqli("localhost","root","","hobbydb",3307);
 if($conexion->connect_error){
    die("Conexion Fallida: ".$conexion->connect_error);
 }
?>
