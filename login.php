<?php 
require_once './auxis/componentes.php';
?>

<!DOCTYPE html>
<html>

<?php
if(!empty($_GET['msg'])){
    $error = $_GET['msg'];
    if($error == "ok"){
        $msg = "<h4>Se ha registrado tu usuario, Inicia secion...</h4>";
    } elseif($error == "nous"){
        $msg = "<h4>No existe ningun usuario con ese correo asignado...</h4>";
    } elseif($error == "nocr"){
        $msg = "<h4>Contraseña incorrecta...</h4>";
    } elseif($error == "inc"){
        $msg = "<h4>Usuario inactivo...</h4>";
    }
    
}else{
    $msg = '';
}
?>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php menuprincipal(); ?>
    </header>
    <div>
        <form action="./auxis/logaux.php" method="post" class="user">
            <h1>Ingresa</h1>
            <?php echo $msg ?>
            <label for="correo">Correo electronico</label>
            <input type="text" name="correo" placeholder="juanperez@gmail.com">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" placeholder="Contraseña">
            <input type="submit" value="Login" class="ok">
        </form>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>

</html>