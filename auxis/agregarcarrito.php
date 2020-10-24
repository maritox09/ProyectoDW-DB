<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id_plat = $_GET['id'];
$tiempo = $_GET['menu'];
$sql = "INSERT INTO carrito (id_plat) VALUES ($id_plat)";

if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/carrito.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/menus.php?menu=$tiempo'>Regresar</a>");
}
?>