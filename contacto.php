<?php 
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php menuprincipal(); ?>
    </header>
    <div class="wrapper-menus">
        <div class="row">
            <div class="col">
                <h1>Contactanos</h1>
                <h2>Telefono: +502 3185-8744</h2>
                <h2>PBX: 1779</h2>
                <h2>FAX: +502 4789-9633</h2>
                <h2>Email: mr.taco@gmail.com</h2>
            </div>
            <div class="col"><div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=dollar%20city&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2torrentz.net"></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
        </div>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>