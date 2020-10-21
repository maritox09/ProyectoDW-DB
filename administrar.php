<?php
require_once './auxis/componentes.php';
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