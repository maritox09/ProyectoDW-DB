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

$sql = "DELETE FROM platillos WHERE id = $id";
$sql2 = "DELETE FROM plat_ing WHERE id_plat = $id";
if(mysqli_query($con,$sql) and mysqli_query($con,$sql2)){
    header("Location: /proyectodbdw/admin/platillos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/ingredientes.php'>Regresar</a>");
}
