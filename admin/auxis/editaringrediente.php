<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_GET['id'];
$sql = "SELECT * FROM ingredientes WHERE id = $id";
$resultado = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Editar <?php echo $row['nombre']; ?></title>
</head>
<body>
<header>
        <img src="/proyectodbdw/Assets/logo.jpg" class="logo">
        <a href="/proyectodbdw/main.php">Inicio</a>
        <a href="/proyectodbdw/admin/ingredientes.php">Regresar</a>
        <a href="/proyectodbdw/auxis/logout.php">Logout</a>
    </header>
    <div class="editar">
        <h3>Editar <?php echo $row['nombre']; ?></h3>
        <form method="post" action="/proyectodbdw/admin/auxis/editing.php" class="editar">
            ID: <input type="text" name="id" required value="<?php echo $row['id']; ?>" readonly>
            Ingrediente: <input type="text" name="nombre" required value="<?php echo $row['nombre']; ?>">
            Cantidad: <input type="text" name="cantidad" required value="<?php echo $row['cantidad']; ?>">
            <input type="submit" value="Actualizar" class="ok">
        </form>
    </div>
    <div class="editar">
        <h3>Agregar/Restar <?php echo $row['nombre']; ?></h3>
        <form method="post" action="/proyectodbdw/admin/auxis/agresing.php" class="editar">
            <input type="hidden" name="id" required value="<?php echo $row['id']; ?>" readonly>
            <input type="hidden" name="nombre" required value="<?php echo $row['nombre']; ?>">
            Cantidad: <input type="text" name="cantidad" required>
            <input type="submit" value="Actualizar" class="ok">
        </form>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="/proyectodbdw/Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>
</html>