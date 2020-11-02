<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_GET['id'];
$activo = $_GET['estado'];

if($activo == 1){
    $sql = "UPDATE usuarios SET activo = false WHERE id_usuario = $id";
    if(mysqli_query($con,$sql)){
        header("Location: /proyectodbdw/admin/usuarios.php");
    } else {
        die("Algo salio mal <a href='/proyectodbdw/administrar.php'>Regresar</a>");
    }
}

if($activo == 0){
    $sql = "UPDATE usuarios SET activo = true WHERE id_usuario = $id";
    if(mysqli_query($con,$sql)){
        header("Location: /proyectodbdw/admin/usuarios.php");
    } else {
        die("Algo salio mal <a href='/proyectodbdw/administrar.php'>Regresar</a>");
    }
}

?>