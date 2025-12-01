<?php
$con = new mysqli("localhost", "root", "", "bd_agenda2025",3307);
if ($con->connect_error) {
    die("conexion fallada" . $con->connect_error);
}
?>