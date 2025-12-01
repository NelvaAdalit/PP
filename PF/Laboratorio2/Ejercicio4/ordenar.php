<?php
function ordenarPalabras($arreglo) {
    $n = count($arreglo);
   
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if (strtolower($arreglo[$j]) > strtolower($arreglo[$j + 1])) {
                
                $temp = $arreglo[$j];
                $arreglo[$j] = $arreglo[$j + 1];
                $arreglo[$j + 1] = $temp;
            }
        }
    }
    return $arreglo;
}

$palabras = $_POST['palabras'];
$ordenadas = ordenarPalabras($palabras);
echo "<div style='border: 2px solid red; background-color: yellow; width: fit-content; margin: auto; padding: 10px;'>";
echo "<h3>Palabras ordenadas:</h3>";
echo "<ul>";
for ($i = 0; $i < count($ordenadas); $i++) {
    echo "<li>" . $ordenadas[$i] . "</li>";
}
echo "</ul>";
echo "</div>";
?>
