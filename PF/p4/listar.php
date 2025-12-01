<?php
include("conexion.php");
$sql="SELECT r.id, r.fotografia, r.titulo,t.tiporeceta as tipo , r.preparacion FROM recetas r
 LEFT JOIN tiporeceta t ON r.idtiporeceta=t.id ORDER BY r.id";
$resultado=$con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

    <style>
        table{
            border:1px solid black;
            border-collapse:collapse;
        }
        td{
            border:1px solid black; 
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Fotografia</th>
            <th>Titulo</th>
            <th>Tipo Receta</th>
            <th>Preparacion</th>
        </tr>
        <?php
        while($fila=mysqli_fetch_array($resultado)){
            ?>
            <tr>
                <td><img style="width:50px; heigth:50px;" src="images/<?php echo $fila['fotografia'] ?>"></td>
                <td><?php echo $fila['titulo'] ?></td>
                <td><?php echo $fila['tipo'] ?></td>
                <td><?php echo $fila['preparacion'] ?></td>
                <td><button onclick="javascript:tomarReceta(<?php echo $fila['id']; ?>)" class="btn btn-outline-warning">Editar</button></td>
                <td><button onclick="javascript:eliminarReceta(<?php echo $fila['id']?>)"  class="btn btn-outline-danger" >Eliminar</button></td>
            </tr>
            <?php
        }
        ?>
    </table>
      <button onclick="javascript: cargarModal('form_insertar.php')" >INSERTAR RECETA</button>
    <script src="bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
     <script src="script.js"></script>
</body>
</html>