<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header("Location:login.php");
    exit();
}
// Si tuvieras roles, aquí podría pero como no tengo no lo usare para validar roles
?>
