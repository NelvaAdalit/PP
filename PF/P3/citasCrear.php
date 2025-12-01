<?php
include("conexion.php");
$id_medico=$_POST['id_medico'];
$id_paciente=$_POST['id_paciente'];
$fecha_cita=$_POST['fecha_cita'];
$hora_cita=$_POST['hora_cita'];
$motivo=$_POST['motivo'];

$sql_verificar="SELECT id FROM citas WHERE id_medico=? AND fecha_cita=? AND hora_cita=?";
$stmt_verificar=$con->prepare($sql_verificar);

$stmt_verificar->bind_param("iss", $id_medico,$fecha_cita,$hora_cita);
$stmt_verificar->execute();
$result_revificar=$stmt_verificar->get_result();

if($result_revificar->num_rows>0){
     echo "<h2>Error: El médico seleccionado ya tiene una cita programada en esa fecha y hora. éxito</h2>";
    echo "<p>Por favor, elija otro horario.</p>";
}else{
    $stmt=$con->prepare('INSERT INTO citas (id_paciente,id_medico,fecha_cita,hora_cita,motivo) VALUES (?,?,?,?,?)');
    $stmt->bind_param("iisss",$id_paciente,$id_medico,$fecha_cita,$hora_cita,$motivo);

    if($stmt->execute()){
        echo "Cita registrada con éxito";
    }else{
        echo "Error: ".$stmt->error;
    }
    $stmt->close();
}
$stmt_verificar->close();
$con->close();

?>