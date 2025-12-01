<?php
include("conexion.php");
$alumnos=$_POST['alumno'];
$fotos = $_FILES['alumno'];

$ruta_subida = "fotografias/";

$sql = "INSERT INTO alumnos(fotografia, nombres, apellidos, cu, sexo, codigocarrera) VALUES (?,?,?,?,?,?)";
$stmt = $con->prepare($sql);	

foreach($alumnos as $cont => $alumno){
    $nombres = $alumno['nombres'];
    $apellidos=$alumno['apellidos'];
    $cu=$alumno['cu'];
    $sexo=$alumno['sexo'];
    $carrera=$alumno['carrera'];
    

    if (isset($fotos['name'][$cont]['fotografia']) && $fotos['name'][$cont]['fotografia']!= ''){
        $nombreTemporal = $fotos['tmp_name'][$cont]['fotografia'];
        $nombreOriginal = $fotos['name'][$cont]['fotografia'];

        $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
        $nombreFinal = uniqid('alumno') . '_' . time(). '.' . $extension;
        $ruta_destino = $ruta_subida . $nombreFinal;

        if(move_uploaded_file($nombreTemporal, $ruta_destino)){

        }else{
            echo "Error al mover la fotografia";

        }
        
    }else{
        echo "Error al subir la fotografia";
    }
    
    $stmt->bind_param('sssssi', $nombreFinal, $nombres,$apellidos, $cu, $sexo,$carrera);
    
    if(!$stmt->execute()){
        echo "Error al insertar alumno";
    }

}   

    $stmt->close();
    $con->close();
    header('Location: read.php');

?>

