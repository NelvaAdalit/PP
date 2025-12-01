<?php
include("conexion.php");
$sql1="SELECT * FROM pacientes";
$result=$con->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
        }
        tr{
            border:1px solid black;
        }
        th{
            
            border:1px solid black;
            
        }
 
        td{
            border:1px solid black;
           
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Telefono</th>
            <th>Correo</th>
        </tr>
        <?php
        while($fila=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $fila['nombre']?></td>
                <td><?php echo $fila['documento']?></td>
                <td><?php echo $fila['telefono']?></td>
                <td><?php echo $fila['correo']?></td>
                <td><a href="javascript:TomarPaciente(<?php echo $fila['id'];?>)">Editar</a></td>
                <td><a href="javascript:eliminarPaciente(<?php echo $fila['id']?>)">Eliminar</a></td>
            </tr>
            <?php
        }
        ?>
    </table>


</body>
</html>