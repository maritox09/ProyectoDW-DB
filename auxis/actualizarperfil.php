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
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$tarjeta = $_POST['tarjeta'];
$vencimiento = $_POST['vencimiento'];

echo $vencimiento;

$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = $telefono, direccion = '$direccion' WHERE id_usuario = $id";
if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/perfil.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/perfil.php'>Regresar</a>");
}

