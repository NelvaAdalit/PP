<?php
$temp = (float)$_POST['temperatura'];
$unidad = $_POST['unidad'];

$celsius = 0;
$fahrenheit = 0;
$kelvin = 0;

switch ($unidad) {
    case 'C':
        $celsius = $temp;
        $fahrenheit = ($celsius * 9/5) + 32;
        $kelvin = $celsius + 273.15;
        break;
    case 'F':
        $fahrenheit = $temp;
        $celsius = ($fahrenheit - 32) * 5/9;
        $kelvin = $celsius + 273.15;
        break;
    case 'K':
        $kelvin = $temp;
        $celsius = $kelvin - 273.15;
        $fahrenheit = ($celsius * 9/5) + 32;
        break;
}
echo "<table style='border: 2px solid green; background-color: white; padding: 10px;'>
        <tr><th>Unidad</th><th>Valor</th></tr>
        <tr><td>Celsius (°C)</td><td>" . round($celsius, 2) . "</td></tr>
        <tr><td>Fahrenheit (°F)</td><td>" . round($fahrenheit, 2) . "</td></tr>
        <tr><td>Kelvin (K)</td><td>" . round($kelvin, 2) . "</td></tr>
      </table>";
?>

