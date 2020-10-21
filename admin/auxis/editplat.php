<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$desc = $_POST['descripcion'];
$precio = $_POST['precio'];
if(!empty($_POST['disponible'])){
    $disp = 'true';
} else {
    $disp = 'false';
}
if(!empty($_POST['destacado'])){
    $dest = 'true';
} else {
    $dest = 'false';
}

$sql = "UPDATE platillos SET nombre = '$nombre', descripcion = '$desc', precio = $precio, disponible = $disp, destacado = $dest WHERE id = $id";
if(mysqli_query($con,$sql)){
    header("Location: /proyectodbdw/admin/platillos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/platillos.php'>Regresar</a>");
}