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

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];

$sql = "UPDATE ingredientes SET nombre = '$nombre', cantidad = $cantidad WHERE id = $id";

if(mysqli_query($con, $sql)){
    header("Location: /proyectodbdw/admin/ingredientes.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/ingredientes.php'>Regresar</a>");
}