
<?php
include("conexion.php");

$titulo=$_POST['titulo'];
$tiporeceta=$_POST['tiporeceta'];
$preparacion=$_POST['preparacion'];

$directorio="images/";

$nombreArchivo = uniqid() . "_" . basename($_FILES['fotografia']['name']);
$rutaDestino = $directorio . $nombreArchivo;

if (!move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)) {
    echo json_encode(['success' => false, 'message' => 'Error al guardar la imagen']);
    exit;
}

$stmt = $con->prepare('INSERT INTO recetas (fotografia, titulo, idtiporeceta, preparacion) VALUES (?, ?, ?, ?)');
$stmt->bind_param("ssis", $nombreArchivo, $titulo, $tiporeceta, $preparacion);

$stmt->execute();


$stmt->close();
$con->close();

?>
