<?php
$cantidad = (int)$_POST['cantidad'];

echo "<form action='ordenar.php' method='post'>";
for ($i = 0; $i < $cantidad; $i++) {
    echo "Palabra " . ($i + 1) . ": <input type='text' name='palabras[]' required><br>";
}
echo "<input type='submit' value='Ordenar'>";
echo "</form>";
?>
