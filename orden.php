<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM estadopedidos WHERE id_pedido = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden numero <?php echo $id; ?></title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <?php menuprincipal() ?>
    </header>
    <div class="wrapper-platillos">
        <div class="row">
            <div class="col">
                <h1>Orden numero <?php echo $id; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Estado: <?php echo $row['estado']; ?></h1>
            </div>
        </div>
    </div>
    <footer>
        <?php footer() ?>
    </footer>
</body>
</html>