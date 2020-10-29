<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$id = $_GET['id'];
$estado = $_GET['estado'];

if($estado == 'aceptado'){
    if(mysqli_query($con,"UPDATE estadopedidos SET estado = 'preparacion' WHERE id_pedido = $id")){
        header("Location: /proyectodbdw/admin/pedidos.php");
    } else {
        die("Algo salio mal <a href='/proyectodbdw/admin/pedidos.php'>Regresar</a>");
    }
}
if($estado == 'preparacion'){
    if(mysqli_query($con,"UPDATE estadopedidos SET estado = 'ruta' WHERE id_pedido = $id")){
        header("Location: /proyectodbdw/admin/pedidos.php");
    } else {
        die("Algo salio mal <a href='/proyectodbdw/admin/pedidos.php'>Regresar</a>");
    }
}
if($estado == 'ruta'){
    if(mysqli_query($con,"UPDATE estadopedidos SET estado = 'entregado' WHERE id_pedido = $id")){
        header("Location: /proyectodbdw/admin/pedidos.php");
    } else {
        die("Algo salio mal <a href='/proyectodbdw/admin/pedidos.php'>Regresar</a>");
    }
}
if($estado == 'entregado'){
    header("Location: /proyectodbdw/admin/pedidos.php");
}
?>