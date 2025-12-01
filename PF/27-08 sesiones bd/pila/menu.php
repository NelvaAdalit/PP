<?php
include("operaciones.php");
session_start();

// Si vienen datos del formulario, procesarlos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    
    // Guardar en sesión
    $_SESSION['a'] = $a;
    $_SESSION['b'] = $b;
    $_SESSION['c'] = $c;
    
    // Guardar en cookies (válidas por 1 hora)
    setcookie("a", $a, time() + 3600, "/");
    setcookie("b", $b, time() + 3600, "/");
    setcookie("c", $c, time() + 3600, "/");
    
    // Crear objeto de operaciones
    $_SESSION['operaciones'] = new Operaciones($a, $b, $c);
}

// Si viene una operación por GET
if (isset($_GET['op']) && isset($_SESSION['operaciones'])) {
    $operacion = $_GET['op'];
    $resultado = '';
    $simbolo = '';
    $color = '';
    
    switch($operacion) {
        case 'sumar':
            $resultado = $_SESSION['operaciones']->sumar();
            $simbolo = '+';
            $color = '#f44336';
            $titulo = 'Suma';
            break;
        case 'restar':
            $resultado = $_SESSION['operaciones']->restar();
            $simbolo = '-';
            $color = '#FFC107';
            $titulo = 'Resta';
            break;
        case 'multiplicar':
            $resultado = $_SESSION['operaciones']->multiplicar();
            $simbolo = '×';
            $color = '#2196F3';
            $titulo = 'Multiplicación';
            break;
        case 'dividir':
            $resultado = $_SESSION['operaciones']->dividir();
            $simbolo = '÷';
            $color = '#4CAF50';
            $titulo = 'División';
            break;
    }
    
    if ($resultado !== '') {
        $a = $_SESSION['operaciones']->getA();
        $b = $_SESSION['operaciones']->getB();
        $c = $_SESSION['operaciones']->getC();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Resultado - <?php echo $titulo; ?></title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    max-width: 500px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #f4f4f4;
                }
                .container {
                    background-color: white;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    text-align: center;
                }
                h1 {
                    color: <?php echo $color; ?>;
                }
                .operacion {
                    font-size: 24px;
                    margin: 20px 0;
                    color: #555;
                }
                .resultado {
                    font-size: 36px;
                    color: <?php echo $color; ?>;
                    font-weight: bold;
                    margin: 20px 0;
                }
                .error {
                    color: #f44336;
                }
                .btn {
                    display: inline-block;
                    padding: 12px 30px;
                    margin: 10px;
                    background-color: <?php echo $color; ?>;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 16px;
                }
                .btn:hover {
                    opacity: 0.8;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1><?php echo $titulo; ?></h1>
                <div class="operacion">
                    <?php echo $a; ?> <?php echo $simbolo; ?> <?php echo $b; ?> <?php echo $simbolo; ?> <?php echo $c; ?> =
                </div>
                <div class="resultado <?php echo (is_string($resultado) ? 'error' : ''); ?>">
                    <?php echo $resultado; ?>
                </div>
                <a href="menu.php" class="btn">Volver al Menú</a>
            </div>
        </body>
        </html>
        <meta http-equiv="refresh" content="3;url=menu.php">
        <?php
        exit();
    }
}

// Verificar si hay valores en la sesión
if (!isset($_SESSION['a']) || !isset($_SESSION['b']) || !isset($_SESSION['c'])) {
    header("Location: pregunta3.html");
    exit();
}

$a = $_SESSION['a'];
$b = $_SESSION['b'];
$c = $_SESSION['c'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Operaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .valores {
            background-color: #e8f5e9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .valores p {
            margin: 5px 0;
            font-size: 18px;
            color: #2e7d32;
        }
        .menu-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
        }
        .btn {
            padding: 15px;
            text-align: center;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s;
            display: block;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        .btn-sumar {
            background-color: #f44336;
        }
        .btn-restar {
            background-color: #FFC107;
        }
        .btn-multiplicar {
            background-color: #2196F3;
        }
        .btn-dividir {
            background-color: #4CAF50;
        }
        .btn-reset {
            background-color: #9E9E9E;
            grid-column: 1 / -1;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Menú de Operaciones</h1>
        
        <div class="valores">
            <p><strong>A = <?php echo $a; ?></strong></p>
            <p><strong>B = <?php echo $b; ?></strong></p>
            <p><strong>C = <?php echo $c; ?></strong></p>
        </div>
        
        <div class="menu-buttons">
            <a href="menu.php?op=sumar" class="btn btn-sumar">Sumar</a>
            <a href="menu.php?op=restar" class="btn btn-restar">Restar</a>
            <a href="menu.php?op=multiplicar" class="btn btn-multiplicar">Multiplicar</a>
            <a href="menu.php?op=dividir" class="btn btn-dividir">Dividir</a>
            <a href="pregunta3.html" class="btn btn-reset">Cambiar Valores</a>
        </div>
    </div>
</body>
</html>
