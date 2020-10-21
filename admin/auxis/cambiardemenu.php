<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';

$con = conectardb();
$id = $_GET['id'];
$nombre = $_GET['nombre'];

$row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tiempo WHERE id_plat = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de menu</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header> <?php menuadmin(); ?> </header>
    <?php permisoempleado(); ?>
    <div class="wrapper-platillos">
        <form class="editar" action="/proyectodbdw/admin/auxis/menucamaux.php" method="post">
            <h1>Cambiar <?php echo $nombre; ?> de menu</h1>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Nombre: <input type="text" value="<?php echo $nombre; ?>" required readonly>
            Menu: <input list="menus" name="tiempo" value="<?php echo $row['tiempo'];?>" required>
            <input type="submit" value="Cambiar">
            <datalist id="menus">
                <option value="desayuno">
                <option value="almuerzo">
                <option value="cena">
            </datalist>
        </form>
    </div>
    <footer> <?php footer(); ?> </footer>
</body>
</html>