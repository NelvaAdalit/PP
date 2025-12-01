<?php
function esPrimo($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

$n = (int)$_POST['n'];
if ($n > 0) {
    $primos = [];
    $contador = 0;
    $numero = 2;

    while ($contador < $n) {
        if (esPrimo($numero)) {
            $primos[] = $numero;
            $contador++;
        }
        $numero++;
    }
        
    echo "<ol style='border: 4px solid green; background-color: yellow; padding: 40px; margin-left:30px; width:150px;'>";
    foreach ($primos as $p) {
        echo "<li>$p</li>";
    }
    echo "</ol>";
} else {
    echo "<h3>Por favor, ingrese un número válido mayor que el 0.</h3>";
}
?>

