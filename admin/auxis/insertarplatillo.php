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

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
if(!empty($_POST['destacado'])){
    $destacado = 'true';
} else {
    $destacado =  'false';
}
if(!empty($_POST['disponible'])){
    $disponible = 'true';
} else {
    $disponible =  'false';
}

$sql = "INSERT INTO platillos (nombre, descripcion, precio, disponible, destacado) VALUES('$nombre', '$descripcion', $precio, $disponible, $destacado)";
if(mysqli_query($con, $sql)){
    header("Location: /proyectodbdw/admin/platillos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/platillos.php'>Regresar</a>");
}