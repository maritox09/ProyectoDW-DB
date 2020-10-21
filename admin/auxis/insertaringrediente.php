<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO ingredientes(nombre, cantidad) VALUES('$nombre',$cantidad)";
if(mysqli_query($con, $sql)){
    header("Location: /proyectodbdw/admin/ingredientes.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/ingredientes.php'>Regresar</a>");
}
?>