<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_POST['id'];
$com = $_POST['comentario'];

$sql = "UPDATE pedidos SET comentario = '$com' WHERE id_pedido = $id";

if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/orden.php?id=$id");
} else {
    die("Algo salio mal <a href='/proyectodbdw/main.php'>Regresar</a>");
}

?>