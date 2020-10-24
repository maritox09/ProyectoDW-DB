<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM estadopedidos WHERE id_pedido = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar pedido <?php echo $id; ?></title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<header> <?php menuadmin(); ?> </header>
    <?php permisoempleado(); ?>
    <div class="wrapper-platillos">
        <form class="editar" action="/proyectodbdw/admin/auxis/estadopedidoaxu.php" method="post">
            <h1>Cambiar pedido no. <?php echo $id; ?> de estado</h1>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Estado: <input list="estados" name="estado" value="<?php echo $row['estado'];?>" required>
            <input type="submit" value="Cambiar">
            <datalist id="estados">
                <option value="aceptado">
                <option value="preparacion">
                <option value="ruta">
                <option value="entregado">
            </datalist>
        </form>
    </div>
    <footer> <?php footer(); ?> </footer>
</body>
</html>