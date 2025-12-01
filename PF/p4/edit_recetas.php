<?php
include("conexion.php");

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$tiporeceta = $_POST['tiporeceta'];
$preparacion = $_POST['preparacion'];

$directorio = "images/";
$nombreArchivo = null;


if (!empty($_FILES['fotografia']['name'])) {
    $nombreArchivo = uniqid() . "_" . basename($_FILES['fotografia']['name']);
    $rutaDestino = $directorio . $nombreArchivo;

    if (!move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)) {
        echo "Error al guardar la imagen";
        exit;
    }
} else {

    $stmt = $con->prepare('SELECT fotografia FROM recetas WHERE id = ?');
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $nombreArchivo = $row['fotografia'];
    $stmt->close();
}

$stmt = $con->prepare('UPDATE recetas SET fotografia=?, titulo=?, idtiporeceta=?, preparacion=? WHERE id=?');
$stmt->bind_param("ssisi", $nombreArchivo, $titulo, $tiporeceta, $preparacion, $id);
$stmt->execute();

echo "Receta actualizada correctamente";

$stmt->close();
$con->close();
?>
