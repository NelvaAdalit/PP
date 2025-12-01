<?php
include "conexion.php";

$numero = $_POST['numero'];

$sql = "SELECT codigo, carrera FROM carreras";
$result = $con->query($sql);

$carreras = [];
while ($row = $result->fetch_assoc()) {
    $carreras[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Alumnos</title>
  <style>
    form {
      background-color:#4f81bd;
      border:2px solid black;
    }
    table {
        width:90%;
        margin:20px;
        padding:20px;
    }

    td{
      height:30px;
      min-width: 20px;
    }
    
    .botones{
        display:flex;
        margin-left: 30px;
        margin-bottom: 30px;
    }
   button{
    padding:10px 20px ;
    border-radius:5px;
    background-color:white;
    margin-left:5px;
    margin-right: 10px;
   }
   
   button:hover{
    border: 4px solid red ;
   }

    th{
      font-weight: bold;
    }

  </style>
</head>
<body>
  <form action="insertar.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <th></th>
        <th>Fotografía</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>CU</th>
        <th>Sexo</th>
        <th>Carrera</th>
      </tr>

      <?php for ($i = 0; $i < $numero; $i++): ?>
        <tr>
          <td><?= $i + 1 ?></td>

          <td>
            <input type="file" name="alumno[<?= $i ?>][fotografia]">
          </td>

          <td>
            <input type="text" name="alumno[<?= $i ?>][nombres]" >
          </td>

          <td>
            <input type="text" name="alumno[<?= $i ?>][apellidos]" >
          </td>

          <td>
            <input type="text" name="alumno[<?= $i ?>][cu]" >
          </td>

          <td>
            <label><input type="radio" name="alumno[<?= $i ?>][sexo]" value="M" > Masculino</label>
            <label><input type="radio" name="alumno[<?= $i ?>][sexo]" value="F"> Femenino</label>
          </td>

          <td>
            <select name="alumno[<?= $i ?>][carrera]" >
              <option value="">Seleccione</option>
              <?php foreach ($carreras as $carrera): ?>
                <option value="<?= $carrera['codigo'] ?>"><?= $carrera['carrera'] ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
      <?php endfor; ?>
    </table>
    <div class="botones" style="text-align:center; margin-top:20px;">
      <button type="submit">Insertar</button>
      <button type="reset">Borrar</button>
    </div>
  </form>
</body>
</html>

