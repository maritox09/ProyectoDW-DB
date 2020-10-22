<?php 
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
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
                <h1>Q: No puedo agregar platillos a mi carrito</h1>
                <h3>A: Debes estar registrado para poder arregar pedidos a tu carrito</h3>
            </div>
            <div class="col">
                <h1>Q: Puedo pedir desde la web para recoger en el restaurante?</h1>
                <h3>A: No, por las disposiciones actuales solamente trabajamos con servicio a domicilio</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Q: Donde agrego mi tarjeta para pagar?</h1>
                <h3>A: En tu perfil puedes agregar una tarjeta de credito para poder pagar tus ordenes</h3>
            </div>
            <div class="col">
                <h1>Q: En donde estan ubicados?</h1>
                <h3>A: Puedes ver nuestras sucursales en el boton "Sucursales" en la parte de abajo de la pagina</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Q: Mi pedido aun no ha sido entregado</h1>
                <h3>A: Puedes revisar el estado de tu pedido en el boton "Revisa tu pedido" en la parte de abajo de la pagina</h3>
            </div>
        </div>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>