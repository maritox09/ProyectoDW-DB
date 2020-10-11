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
        <img src="./Assets/logo.jpg" class="logo">
        <a href="./main.php">Inicio</a>
        <a href="">Desayunos</a>
        <a href="">Almuerzos</a>
        <a href="">Cenas</a>
        <a href="">Promocionales</a>
        <a href="">Historia</a>
        <?php echo $perf; ?>
        <?php echo $reg_carr; ?>
        <?php echo $log_out; ?>
    </header>
    <div class="wrapper-menus">
    <div class="row">
        <div class="col">
            <a href="/proyectodbdw/auxis/detalleplatillo.php"><img src="/proyectodbdw/Assets/desayunos.jpg"></a>
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
        <div class="col">
            <img src="/proyectodbdw/Assets/desayunos.jpg">
            <h3>Tacos de cerdo<img src="/proyectodbdw/Assets/mas.png" class="agregar"><br>Q25.00</h3>
            <p>deliciosos taquitos de cerdo</p>
            
        </div>
    </div>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="./Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>

</html>