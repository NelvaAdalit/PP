<?php
include("conexion.php");
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$sexo=$_POST['sexo'];
$numero_documento=$_POST['numero_documento'];
$sql="INSERT INTO padron(nombres,apellidos,sexo,numero_documento) Values(?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssss",$nombres,$apellidos,$sexo,$numero_documento);
if($stmt->execute())
{
    echo "registro exitoso";
}
?>
////TAREA MIS AMIGOS SERAN 
DINAMICOS BD:YO TABLA AMIGOS
 Y ALLI HAREMOS GRUD  HACER 
 VOLVERLO MIS AMIGOS INSERTAR
  AMIGOS ELIMINAR AMIGOS 
ACTULIZAR AMIGOS EDITA AMIGOSN 
<meta http-equiv="refresh" content="2;url=read.php">