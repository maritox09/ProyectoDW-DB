<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$comentario = $_POST['comentario'];
$id = $_POST['id'];

$sql = "UPDATE pedidos SET comentario = '$comentario' WHERE id_pedido = $id";

if(mysqli_query($con, $sql)){
    header("Location: /proyectodbdw/admin/pedidos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/pedidos.php'>Regresar</a>");
}
?>