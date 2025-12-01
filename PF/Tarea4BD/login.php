<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <form action="autenticar.php" method="post">
        <label for="correo">Correo</label>
        <input type="email" name="correo" >
        <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" >
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
