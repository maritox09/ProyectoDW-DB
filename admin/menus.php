<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Administracion</title>
</head>
<body>
    <header>
        <?php menuadmin(); ?>
    </header>
    <?php permisoempleado(); ?>
    <div>
        <nav>
            <a href='/proyectodbdw/admin/adminMenus.php?menu=desayuno'>Desayunos</a>
            <a href='/proyectodbdw/admin/adminMenus.php?menu=almuerzo'>Almuerzos</a>
            <a href='/proyectodbdw/admin/adminMenus.php?menu=cena'>Cenas</a>
        </nav>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>