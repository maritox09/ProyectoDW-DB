<?php 
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#Q1" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Q: No puedo agregar platillos a mi carrito
                    </a>
                </p>
                <div class="collapse" id="Q1">
                    <div class="card card-body">
                        A: Debes estar registrado para poder arregar pedidos a tu carrito
                    </div>
                </div>
            </div>
            <div class="col">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#Q2" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Q: Puedo pedir desde la web para recoger en el restaurante?
                    </a>
                </p>
                <div class="collapse" id="Q2">
                    <div class="card card-body">
                        A: No, por las disposiciones actuales solamente trabajamos con servicio a domicilio
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#Q3" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Q: Donde agrego mi tarjeta para pagar?
                    </a>
                </p>
                <div class="collapse" id="Q3">
                    <div class="card card-body">
                    A: En tu perfil puedes agregar una tarjeta de credito para poder pagar tus ordenes
                    </div>
                </div>
            </div>
            <div class="col">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#Q4" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Q: En donde estan ubicados?
                    </a>
                </p>
                <div class="collapse" id="Q4">
                    <div class="card card-body">
                    A: Puedes ver nuestras sucursales en el boton "Sucursales" en la parte de abajo de la contacto
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#Q5" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Q: Mi pedido aun no ha sido entregado
                    </a>
                </p>
                <div class="collapse" id="Q5">
                    <div class="card card-body">
                    A: Puedes revisar el estado de tu pedido en el boton "Revisa tu pedido" en la parte de abajo de la pagina
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>