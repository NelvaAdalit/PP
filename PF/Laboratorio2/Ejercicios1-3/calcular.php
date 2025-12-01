<?php
$n = $_POST['n'];
$suma = 0;
$digitos = str_split((string)$n);
foreach($digitos as $d){
    $suma += (int) $d;
}
echo "<p>La suma de los dígitos de $n es: $suma </p>";
?>