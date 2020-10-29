<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM estadopedidos WHERE id_pedido = $id"));
$user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM pedidos WHERE id_pedido = $id"))['id_usuario'];
$data_user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usuarios WHERE id_usuario = $user"));
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
        <div class="row"><div class="col"><h1>Gracias por tu pedido!</h1></div></div>
        <div class="row">
            <div class="col">
                <h1>Orden numero <?php echo $id; ?></h1>
            </div>
            <div class="col">
                <h1>Estado: <?php echo $row['estado']; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <h1>Nombre:<br> <?php echo $data_user['nombre']. " " .$data_user['apellido']; ?></h1>
            </div>
            <div class="col">
            <h1>Direccion:<br> <?php echo $data_user['direccion']; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <h1>Platillos:</h1>
                    <?php 
                        $sql_temp = mysqli_query($con,"SELECT * FROM pedidos_platillos WHERE id_pedido = $id");
                        while($temp = mysqli_fetch_assoc($sql_temp)){
                            $plat = $temp['id_platillos'];
                            $temp2 = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM platillos WHERE id = $plat"))['nombre'];
                            echo "<h3>$temp2</h3>";
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <footer>
        <?php footer() ?>
    </footer>
</body>
</html>