<?php 
session_start();

if(!empty($_SESSION['id'])){
    $ses = $_SESSION['id'];
}else{
    $ses = -1;
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

$sql = "SELECT * FROM roles WHERE id_usuario = '$ses'";
if(mysqli_num_rows(mysqli_query($GLOBALS['con'], $sql)) > 0){
    //return true;
} else{
    //return false;
}

if(!empty($_SESSION['id'])){
    $reg_carr = "<a href='./carrito.php'>Carrito</a>";
    $log_out =  "<a href='./auxis/logout.php'>Logout</a>";
} else{
    $reg_carr = "<a href='./registro.php'>Registro</a>";
    $log_out =  "<a href='./login.php'>Login</a>";
}
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
        <img src="./Assets/logo.jpg" class="logo">
        <a href="./main.php">Inicio</a>
        <a href="">Desayunos</a>
        <a href="">Almuerzos</a>
        <a href="">Cenas</a>
        <a href="">Promocionales</a>
        <a href="">Historia</a>
        <?php echo $reg_carr; ?>
        <?php echo $log_out; ?>
    </header>
    <div class="slider">
        <a href=""><img src="./Assets/destacados.jpg"></a>
    </div>
    <div class="resto">
        <a href=""><img src="./Assets/desayunos.jpg"></a>
        <a href=""><img src="./Assets/almuerzos.jpg"></a>
        <a href=""><img src="./Assets/cenas.jpg"></a>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="./Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>

</html>