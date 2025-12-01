<?php 
include("conexion.php");
$sql="SELECT * FROM medicos";
$resultado=$con->query($sql);
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
        thead{
             margin-top:10px;
            width: 800px;
            border:2px solid black;   

        }
        td{
            margin-top:10px;
            width: 800px;
            border:2px solid black;      
        }
       
    </style>
</head>
<body>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Especilidad</th>
            <th>Telefono</th>
            <th>Correo</th>
       </thead>
       <?php
       while($fila=mysqli_fetch_array($resultado)){
        ?>
            <tr>
                <td><?php echo $fila['nombre'];?></td>
                <td><?php echo $fila['especialidad'];?></td>
                <td><?php echo $fila['telefono'];?></td>
                <td><?php echo $fila['correo'];?></td>
                <td><a href="javascript:TomarMedico(<?php echo $fila['id'];?>)">Editar</a></td>
                <td><a href="javascript:eliminarMedico(<?php echo $fila['id']?>)">Eliminar</a></td>
            </tr>

        <?php
       }
       ?>

    </table>
</body>
</html>