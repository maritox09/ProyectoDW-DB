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
$desc = $_POST['descripcion'];
$precio = $_POST['precio'];
if(!empty($_POST['disponible'])){
    $disp = 'true';
} else {
    $disp = 'false';
}
if(!empty($_POST['destacado'])){
    $dest = 'true';
} else {
    $dest = 'false';
}

$sql = "UPDATE platillos SET nombre = '$nombre', descripcion = '$desc', precio = $precio, disponible = $disp, destacado = $dest WHERE id = $id";
if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/admin/platillos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/platillos.php'>Regresar</a>");
}