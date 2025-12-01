<?php
$nombre_cookie = "contador_visitas";

if (isset($_COOKIE[$nombre_cookie])) {
    $visitas = $_COOKIE[$nombre_cookie] + 1;
} else {
    $visitas = 1;
}

setcookie($nombre_cookie, $visitas, time() + (86400 * 30), "/");

echo $visitas;
?>