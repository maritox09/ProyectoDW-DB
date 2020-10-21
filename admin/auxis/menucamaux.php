<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$id = $_POST['id'];
$tiempo = $_POST['tiempo'];

$sql = "UPDATE tiempo SET tiempo = '$tiempo' WHERE id_plat = $id";
if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/admin/menus.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/menus.php'>Regresar</a>");
}