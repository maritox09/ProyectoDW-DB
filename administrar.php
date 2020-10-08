<?php
session_start();
if(!empty($_SESSION['id'])){
    $ses = $_SESSION['id'];
    $rol = $_SESSION['rol'];
}else{
    $ses = -1;
    $rol = 'anonimo';
}

if(!empty($_SESSION['id'])){
    if($rol == 'visitante'){
        $a = "<h1>No tiene los permisos necesarios para estar aqui...</h1>";
        $b =  "<a href='./main.php'>Regresar</a>";
        $c =  "";
        $d =  "";
    } elseif($rol == 'empleado'){
        $a = "<a href='./admin/ingredientes.php'>Ingredientes</a>";
        $b =  "<a href='./admin/platillos.php'>Platillos</a>";
        $c =  "<a href='./admin/menus.php'>Menus</a>";
        $d =  "";
    }elseif($rol == 'admin'){
        $a = "<a href='./admin/ingredientes.php'>Ingredientes</a>";
        $b =  "<a href='./admin/platillos.php'>Platillos</a>";
        $c =  "<a href='./admin/menus.php'>Menus</a>";
        $d =  "<a href='./admin/usuarios.php'>Usuarios</a>";
    }
}else{
    $a = "<h1>No tiene los permisos necesarios para estar aqui...</h1>";
    $b =  "<a href='./main.php'>Regresar</a>";
    $c =  "";
    $d =  "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Administracion</title>
</head>
<body>
    <header>
        <img src="./Assets/logo.jpg" class="logo">
        <a href="./main.php">Inicio</a>
        <a href="./auxis/logout.php">Logout</a>
    </header>
    <div>
        <nav>
            <?php echo $a; ?>
            <?php echo $b; ?>
            <?php echo $c; ?>
            <?php echo $d; ?>
        </nav>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="./Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>
</html>