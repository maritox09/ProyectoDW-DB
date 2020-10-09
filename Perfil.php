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

$sql = "SELECT * FROM usuarios WHERE id_usuario = $ses";
$resultado = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($resultado);

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
        <?php echo $perf; ?>
        <?php echo $reg_carr; ?>
        <?php echo $log_out; ?>
    </header>
    <div class="perfil">
        <form class="user" action="/proyectodbdw/auxis/actualizarperfil.php" method="post">
            <h1>perfil</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_usuario'] ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" required>
            Apellido: <input type="text" name="apellido" value="<?php echo $row['apellido'] ?>" required>
            Correo electronico: <input type="text" name="correo" value="<?php echo $row['correo'] ?>" required>
            Direccion: <input type="text" name="direccion" value="<?php echo $row['direccion'] ?>" required>
            Telefono: <input type="text" name="telefono" value="<?php echo $row['telefono'] ?>" required>
            No. de Tarjeta: <input type="text" name="tarjeta" value="<?php echo $row['notarjeta'] ?>">
            Fecha de vencimiento:<input type="month" name="vencimiento" value="<?php echo $row['vencimiento'] ?>">
            <input type="submit" value="Actualizar Datos">
        </form>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="./Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>

</html>