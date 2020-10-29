<?php
require_once './auxis/db.php';
require_once './auxis/componentes.php';
$con = conectardb();
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
        <?php menuprincipal(); ?>
    </header>
    <div class="slider">
        <a href=""><img src="./Assets/destacados.jpg"></a>
    </div>
    <div class="resto">
        <a href="/proyectodbdw/menus.php?menu=desayuno"><img src="./Assets/desayunos.jpg"></a>
        <a href="/proyectodbdw/menus.php?menu=almuerzo"><img src="./Assets/almuerzos.jpg"></a>
        <a href="/proyectodbdw/menus.php?menu=cena"><img src="./Assets/cenas.jpg"></a>
    </div>
    <footer>
    <?php footer(); ?>
    </footer>
</body>
</html>