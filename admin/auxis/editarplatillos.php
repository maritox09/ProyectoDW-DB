<?php

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

$id = $_GET['id'];
$sql = "SELECT * FROM plat_ing WHERE id_plat = $id";
$resultado1 = mysqli_query($con,$sql);
$sql2 = "SELECT * FROM platillos WHERE id_plat = $id";
$resultado2 = mysqli_query($con,$sql2);
$sql3 = "SELECT * FROM ingredientes;
$resultado3 = mysqli_query($con,$sql3)";

if(mysqli_num_rows($resultado1) < 1){
    for ($i = 1; $i <= 5; $i++) {
        $sql2 = "INSERT INTO plat_ing(id_plat, id_ing, cantidad) VALUES ($id, NULL, 0)";
        mysqli_query($con,$sql2);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Editar <?php echo $row['nombre']; ?></title>
</head>
<body>
<header>
        <img src="/proyectodbdw/Assets/logo.jpg" class="logo">
        <a href="/proyectodbdw/main.php">Inicio</a>
        <a href="/proyectodbdw/admin/platillos.php">Regresar</a>
        <a href="/proyectodbdw/auxis/logout.php">Logout</a>
    </header>
    <footer>
        <a href="">Contactanos</a>
        <img src="/proyectodbdw/Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>
</html>