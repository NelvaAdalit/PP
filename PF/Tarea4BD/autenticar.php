<?php
session_start();
include("conexion.php");
$correo=$_POST['correo'];
$password=sha1($_POST['password']); 

$sql="SELECT correo FROM usuarios WHERE correo=? AND password=?";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("ss", $correo,$password);
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows==1){
    $_SESSION['correo']=$correo;
    header("Location:leer.php");
    exit();
}else{
    echo "Error: datos de autenticación incorrectos";
    echo '<meta http-equiv="refresh" content="3;url=login.php">'; 
}
?>
