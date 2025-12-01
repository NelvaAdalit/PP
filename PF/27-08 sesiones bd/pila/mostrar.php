<?php include("pila.php");
session_start();

if (!isset($_SESSION['pila'])) {
    die("La pila está vacía.");
}

$_SESSION['pila']->mostrar();

?>

<meta http-equiv="refresh" content="3;url=menu.html">