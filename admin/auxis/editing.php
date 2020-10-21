<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
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