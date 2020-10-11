<?php 
session_start();

if(!empty($_SESSION['id'])){
    $ses = $_SESSION['id'];
    $rol = $_SESSION['rol'];
}else{
    $ses = -1;
    $rol = 'anonimo';
}

function conectardb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyectodbdw";

    $con = mysqli_connect($servername,$username,$password,$dbname);

    if(!$con){
        die("fallo de conexion" .mysqli_connect_error());
    }else{
        return $con;
    }
}

$con = conectardb();

if(!empty($_SESSION['id'])){
    if($rol == 'visitante'){
        $reg_carr = "<a href='./carrito.php'>Carrito</a>";
        $log_out =  "<a href='./auxis/logout.php'>Logout</a>";
        $perf = "<a href='./perfil.php'>Perfil</a>";
    } elseif($rol == 'empleado'  or $rol == 'admin'){
        $reg_carr = "<a href='./administrar.php'>Administrar</a>";
        $log_out =  "<a href='./auxis/logout.php'>Logout</a>";
        $perf = "<a href='./perfil.php'>Perfil</a>";
    }
}else{
    $reg_carr = "<a href='./registro.php'>Registro</a>";
    $log_out =  "<a href='./login.php'>Login</a>";
    $perf = "";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mr. Taco</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="/proyectodbdw/Assets/logo.jpg" class="logo">
        <a href="/proyectodbdw/main.php">Inicio</a>
        <a href="/proyectodbdw/desayunos.php">Desayunos</a>
        <a href="">Almuerzos</a>
        <a href="">Cenas</a>
        <a href="">Promocionales</a>
        <a href="">Historia</a>
        <?php echo $perf; ?>
        <?php echo $reg_carr; ?>
        <?php echo $log_out; ?>
    </header>
    <div class="wrapper-platillos">
        <div class="row">
            <div class="col">
                <img src="/proyectodbdw/Assets/desayunos.jpg">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Tacos de cerdo</h1>
                <h2>Precio: Q35.00</h2>
            </div>
            <div class="col">
                <h1>Ingredientes:</h1>
                <ul>
                    <li>Tortilla</li>
                    <li>Carne de cerdo</li>
                    <li>Perejil</li>
                    <li>Piña</li>
                    <li>Cebolla</li>
                </ul>
            </div>
            <div class="col">
                <h1>Descripcion:</h1>
                <p>Deliciosos tacos de cerdo acompañados con perejil, piña y cebolla.</p>
            </div>
            <div class="col"><img src="/proyectodbdw/Assets/mas.png" class="agregar"></div>
        </div>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="/proyectodbdw/Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>

</html>