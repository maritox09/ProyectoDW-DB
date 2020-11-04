<?php 
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$id = $_GET['id'];
$sql = "SELECT * FROM pedidos WHERE id_pedido = $id";
$resultado = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar comentario</title>
    <link rel="stylesheet" href="./Estilos/dist/main.css">
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php menuprincipal() ?>
    </header>
    <?php permisoadmin() ?>
    <div class="perfil">
        <form class="user" action="/proyectodbdw/admin/auxis/actualizarcomentario.php" method="post">
            <h1>Pedido no. <?php echo $id; ?></h1>
            <input type="hidden" name="id" value="<?php echo $row['id_pedido'] ?>">
            Comentario: <input type="text" name="comentario" value="<?php echo $row['comentario'] ?>" required>
            <input type="submit" value="Cambiar comentario" class="ok">
        </form>
    </div>
    <footer>
        <?php footer() ?>
    </footer>
</body>

</html>