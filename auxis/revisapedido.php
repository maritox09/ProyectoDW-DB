<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisa tu pedido</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<header> <?php menuadmin(); ?> </header>
    <?php permisousuario(); ?>
    <div class="wrapper-platillos">
        <form class="editar" action="/proyectodbdw/orden.php" method="get">
            <h1>Ingresa el numero de pedido</h1>
            Estado: <input type="text" name="id" required>
            <input type="submit" value="Revisar estado del pedido">
        </form>
    </div>
    <footer> <?php footer(); ?> </footer>
</body>
</html>