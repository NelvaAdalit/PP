<?php
include("conexion.php");

$sql = "SELECT id, tiporeceta FROM tiporeceta";
$result = $conexion->query($sql);
$opciones = "";
while ($fila = mysqli_fetch_array($result)) {
    $opciones.= '<option value="'.$fila["id"].'">'.$fila["tiporeceta"].'</option>';
}

$where = "";
if(isset($_POST['tipo']) && $_POST['tipo'] != "") {
    $where = "WHERE tipor.id = '".$_POST['tipo']."'";
}

$sql1 = "SELECT r.id, r.fotografia, r.titulo, r.preparacion, tipor.tiporeceta
  FROM recetas r 
  INNER JOIN tiporeceta tipor ON r.idtiporeceta = tipor.id 
  $where";

$result1 = $conexion->query($sql1);
?>

<form action="javascript:filtrarRecetas()" method="post" id="filtrosRecetas">
    <label>Tipo:</label>
    <select name="tipo" onchange=" javascript:filtrarRecetas()">
        <option value="">-- Todos --</option>
        <?php echo $opciones; ?>
    </select>
    <input type="submit" value="Filtrar">
</form>

<div>
<table border="1">
    <tr>
       <th>ID</th>
       <th>Fotografía</th>
       <th>Título</th>
       <th>Tipo</th>
       <th>Preparación</th>
    </tr>
    <?php
    while($fila = mysqli_fetch_array($result1)) {
        $preparacion_abreviada = substr($fila['preparacion'], 0, 50) . '...';
        ?>
        <tr>
             <td><?= $fila['id']; ?></td>
             <td><img src="images/<?= $fila['fotografia']; ?>" style="width: 50px; height: 50px;"></td>
             <td><?= $fila['titulo']; ?></td>
             <td><?= $fila['tiporeceta']; ?></td>
             <td><?= $preparacion_abreviada; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</div>
