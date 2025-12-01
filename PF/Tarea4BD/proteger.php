<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['correo'])) {
    echo '<meta http-equiv="refresh" content="2;url=login.php">';
    die("Usted no está autorizado");
}
?>
