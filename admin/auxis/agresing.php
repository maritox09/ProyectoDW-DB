<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];

$sql = "SELECT * FROM ingredientes WHERE id = $id";
$resultado = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($resultado);

$nuevacantidad = $row['cantidad'] + $cantidad;

$sql = "UPDATE ingredientes SET nombre = '$nombre', cantidad = $nuevacantidad WHERE id = $id";

if(mysqli_query($con, $sql)){
    header("Location: /proyectodbdw/admin/ingredientes.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/ingredientes.php'>Regresar</a>");
}