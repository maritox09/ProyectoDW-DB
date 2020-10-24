<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id =  $_GET['id'];

if(mysqli_query($con,"DELETE FROM carrito WHERE id_plat = $id")){
    header("Location: /proyectodbdw/carrito.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/carrito.php'>Regresar</a>");
}

?>