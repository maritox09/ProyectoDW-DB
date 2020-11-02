<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$id = $_POST['id'];

$sql = "UPDATE usuarios SET password = '123' WHERE id_usuario = $id";

if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/admin/usuarios.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/usuarios.php'>Regresar</a>");
}
?>