<?php
require_once './componentes.php';
$id = $_POST['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php menuprincipal(); ?>
    </header>
    <?php permisousuario(); ?>
    <div class="perfil">
        <form class="user" action="/proyectodbdw/auxis/actualizarpassword.php" method="post">
            <h1>Cambio de contraseña</h1>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            Contraseña actual: <input type="text" name="actual" required>
            Nueva contraseña: <input type="text" name="nueva" required>
            repita nueva contraseña: <input type="text" name="nueva2" required>
            <input type="submit" value="Cambiar contraseña">
        </form>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>