<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$id = $_POST['id'];
$estado = $_POST['estado'];
if(mysqli_query($con,"UPDATE estadopedidos SET estado = '$estado' WHERE id_pedido = $id")){
    header("Location: /proyectodbdw/admin/pedidos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/pedidos.php'>Regresar</a>");
}