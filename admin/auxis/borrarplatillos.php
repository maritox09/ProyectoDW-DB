<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_GET['id'];

$sql = "DELETE FROM platillos WHERE id = $id";
$sql2 = "DELETE FROM plat_ing WHERE id_plat = $id";
if(mysqli_query($con,$sql) and mysqli_query($con,$sql2)){
    header("Location: /proyectodbdw/admin/platillos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/administrar.php'>Regresar</a>");
}
