<?php
include("conexion.php");

$sql="SELECT fotografia, nombres, apellidos, cu, sexo, c.carrera AS carrera
FROM alumnos a 
LEFT JOIN carreras c ON a.codigocarrera = c.codigo";

$result = $con->query($sql);
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
            width: 90%;
        }
        th{
            border: 1px solid black;
            text-align: center;
            background-color: gray;
            color : black;
        }

        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <table border="1"> 
        <tr>
            <th>Nro</th>
            <th>Fotografia</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>CU</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>

        <?php
        $num = 1;
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td> <?php echo $num ?>  </td>
                <td><img src="fotografias/<?= $row['fotografia'] ?>" alt="Foto"></td>
                <td><?= $row['nombres'] ?></td>
                <td><?= $row ['apellidos'] ?> </td>
                <td><?= $row ['cu'] ?></td>
                <td><?= $row ['sexo'] ?></td>
                <td><?= $row ['carrera'] ?></td>
            </tr>
        <?php
        $num++;
        endwhile;
        ?>            
    </table>
    <?php $con ->close(); ?>    
</body>
</html>