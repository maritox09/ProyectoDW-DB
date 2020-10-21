<?php 
require_once './auxis/componentes.php';
require_once './auxis/db.php';
$con = conectardb();

$sql = "SELECT * FROM usuarios WHERE id_usuario = $ses";
$resultado = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mr. Taco</title>
    <link rel="stylesheet" href="./Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php menuprincipal() ?>
    </header>
    <div class="perfil">
        <form class="user" action="/proyectodbdw/auxis/actualizarperfil.php" method="post">
            <h1>perfil</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_usuario'] ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" required>
            Apellido: <input type="text" name="apellido" value="<?php echo $row['apellido'] ?>" required>
            Correo electronico: <input type="text" name="correo" value="<?php echo $row['correo'] ?>" required>
            Direccion: <input type="text" name="direccion" value="<?php echo $row['direccion'] ?>" required>
            Telefono: <input type="text" name="telefono" value="<?php echo $row['telefono'] ?>" required>
            No. de Tarjeta: <input type="text" name="tarjeta" value="<?php echo $row['notarjeta'] ?>">
            Fecha de vencimiento:<input type="month" name="vencimiento" value="<?php echo $row['vencimiento'] ?>">
            <input type="submit" value="Actualizar Datos">
            <button form="contra">Cambiar contraseña</button>
        </form>
        <form id="contra" action="/Proyectodbdw/auxis/cambiarpassword.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id_usuario'] ?>">
        </form>
    </div>
    <footer>
        <?php footer() ?>
    </footer>
</body>

</html>