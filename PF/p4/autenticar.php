<?php
session_start();
include("conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT email, rol FROM usuarios WHERE email=? AND password=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $email;
    $_SESSION['rol'] = $row['rol'];
    echo "success";
} else {
    echo "error";
}
?>
