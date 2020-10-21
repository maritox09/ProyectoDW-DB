<?php
require_once './auxis/componentes.php';

if(!empty($_SESSION['id'])){
    if($rol == 'visitante'){
        $linea1 = "<h1>No tiene los permisos necesarios para estar aqui...</h1>";
        $linea2 =  "<a href='./main.php'>Regresar</a>";
        $linea3 =  "";
        $linea4 =  "";
    } elseif($rol == 'empleado'){
        $linea1 = "<a href='./admin/ingredientes.php'>Ingredientes</a>";
        $linea2 =  "<a href='./admin/platillos.php'>Platillos</a>";
        $linea3 =  "<a href='./admin/menus.php'>Menus</a>";
        $linea4 =  "";
    }elseif($rol == 'admin'){
        $linea1 = "<a href='./admin/ingredientes.php'>Ingredientes</a>";
        $linea2 =  "<a href='./admin/platillos.php'>Platillos</a>";
        $linea3 =  "<a href='./admin/menus.php'>Menus</a>";
        $linea4 =  "<a href='./admin/usuarios.php'>Usuarios</a>";
    }
}else{
    $linea1 = "<h1>No tiene los permisos necesarios para estar aqui...</h1>";
    $linea2 =  "<a href='./main.php'>Regresar</a>";
    $linea3 =  "";
    $linea4 =  "";
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
        <?php menuadmin(); ?>
    </header>
    <div>
        <nav>
            <?php permisoempleado();
            navadministrar();
            ?>

        </nav>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>