<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';

$con = conectardb();

$id_plat = $_GET['id'];
$tiempo = $_GET['menu'];
$sql = "INSERT INTO carrito (id_plat) VALUES ($id_plat)";

if($ses != -1){
    if(mysqli_query($con,$sql)){
        header("Location: /proyectodbdw/carrito.php");
    } else {
        if($tiempo == 'destacado'){
            die("Algo salio mal <a href='/proyectodbdw/destacados.php'>Regresar</a>");
        }else{
            die("Algo salio mal <a href='/proyectodbdw/menus.php?menu=$tiempo'>Regresar</a>");
        }
    }
} else {
    header("Location: /proyectodbdw/menus.php?menu=$tiempo");
}
?>