<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis hobbies</title>
    <link rel="stylesheet" href="hobbie.css">
</head>
<body>
<?php 
  
   include("proteger.php");
    if (!isset($_SESSION['correo'])) {
        header("Location:login.php");
        exit();
    }
 
    include("conexion.php");

    $orden = "id";
    if (isset($_GET['orden'])) {
        $orden = $_GET['orden'];
    }

    $buscar = "%%";
    if (isset($_GET['buscar'])) {
        $buscar = "%" . $_GET['buscar'] . "%";
    }

    $sql="SELECT id, fotografia, nombres, descripcion, frecuencia FROM hobbies WHERE nombres LIKE ? ORDER BY nombres";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("s",$buscar);
    $stmt->execute();
    $result=$stmt->get_result();
?>
<div>
    Correo:<?php echo $_SESSION['correo']; ?>
    <a class="in" href="cerrar.php">Cerrar Sesión</a>
</div>


    <header>
        <h1>LO QUE ME GUSTA HACER EN MI TIEMPO LIBRE</h1>
        <nav>
            <a href="yo.html">Acerca de mí</a>
            <a href="mifamilia.html">Mi familia</a>
            <a href="mishobbies.html">Mis hobbies</a>
            <a href="misamigos.html">Mis amigos</a>
            <a href="miciudad.html">Mi ciudad</a>
            <a href="enviamemensaje.html">Comunícate</a>
        </nav>
    </header>
    <h2>ACERCA DE MIS PASATIEMPOS</h2>
    <p>
        En mi tiempo libre disfruto de diversas actividades que me ayudan a relajarme, aprender y crecer como persona.<br>
        Mis hobbies reflejan mi personalidad: me gusta aprender cosas nuevas, mantenerme activa y expresar mi creatividad.<br>
        Cada actividad que realizo me aporta algo diferente y me ayuda a mantener un equilibrio entre mis estudios y mi vida personal.
    </p>
    <center><h3>MIS ACTIVIDADES FAVORITAS</h3></center>
    <form action="leer.php" method="get">
        <label for="buscar">Buscar Hobby: </label>
        <input type="text" name="buscar" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
        <input type="submit" value="Buscar">
        <br>
        <br>
</form>
    <center>
        <table>
            <tr>
                <td><strong><a href="leer.php?orden=nombres">HOBBY</a></strong></td>
                <td><strong><a href="leer.php?orden=descripcion">DESCRIPCIÓN</a></strong></td>
                <td><strong><a href="leer.php?orden=frecuencia">FRECUENCIA</a></strong></td>
                <td><strong>IMAGEN</a></strong></td>
                <td><strong>ACCIONES</a></strong></td>
            </tr>
            <?php while($row=mysqli_fetch_array($result))
            {?>
            <tr>
                <td><?php echo $row['nombres']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['frecuencia']; ?></td>
                <td><img src="imagenes/<?php echo  $row['fotografia'];?>" >  </td>
                <td>
                    <a class ="link" href="formeditar.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a class ="link" href="borrar.php?id=<?php echo $row['id']; ?>">Borrar</a>
                </td>
            </tr>
             <?php
            }
            $conexion->close();
               ?>
        </table>
    </center>
    <a class="in" href="forminsertar.php">Insertar nuevo hobby</a>
    <br>
    <br>
     <h3>EXTRAS </h3>
     <div class="tabla-flex">
        <div class="celda-flex">
            <img src="imagenes/amigos.jpg" alt="Hobby 1">
            <p>Pasar tiempo con amigos</p>
        </div>
        <div class="celda-flex">
            <img src="imagenes/Duo.png" alt="Hobby 2">
            <p>Revisar duo</p>
        </div>
    </div>
    <h3>IDIOMAS QUE ME INTERESAN</h3>
    <ul class="idiomas-lista">
        <li><strong>Inglés:</strong> Practico diariamente con Duolingo y otras plataformas</li>
        <li><strong>Ruso:</strong> Me fascina este idioma y su cultura, espero empezar a estudiarlo pronto</li>
        <li><strong>Francés:</strong> También está en mi lista de idiomas por aprender</li>
    </ul>
    <h3>PLATAFORMAS DE APRENDIZAJE QUE USO</h3>
    <ol class="plataformas-lista">
        <li><strong>Duolingo</strong> - Para idiomas</li>
        <li><strong>Claseflix</strong> - Cursos universitarios</li>
        <li><strong>FreeCodeCamp</strong> - Programación</li>
        <li><strong>YouTube</strong> - Tutoriales variados</li>
        <li><strong>Udemy</strong> - Cursos especializados</li>
    </ol>
</body>
</html>