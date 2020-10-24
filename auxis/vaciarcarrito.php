<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

if(mysqli_query($con,"DELETE FROM carrito")){
    header("Location: /proyectodbdw/carrito.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/carrito.php'>Regresar</a>");
}

?>