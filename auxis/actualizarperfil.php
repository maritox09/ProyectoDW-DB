<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
if(!empty($_POST['tarjeta'])){
    $tarjeta = $_POST['tarjeta'];
} else {
    $tarjeta = "null";
}
if(!empty($_POST['vencimiento'])){
    $vencimiento = $_POST['vencimiento']."-01";
} else {
    $vencimiento = "9999-09-09";
}

$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = $telefono, direccion = '$direccion', notarjeta = $tarjeta, vencimiento = '$vencimiento' WHERE id_usuario = $id";
if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/perfil.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/perfil.php'>Regresar</a>");
}

