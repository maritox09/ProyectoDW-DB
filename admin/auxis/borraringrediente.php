<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_GET['id'];

$sql = "DELETE FROM ingredientes WHERE id = $id";
if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/admin/ingredientes.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/ingredientes.php'>Regresar</a>");
}
