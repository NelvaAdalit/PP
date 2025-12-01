<?php
$conexion= new mysqli("localhost","root","","bd_recetas",3307);

if(mysqli_connect_error()){
    die("Conexion fallida".mysqli_connect_error());
}
?>