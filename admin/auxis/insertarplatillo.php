<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
if(!empty($_POST['destacado'])){
    $destacado = 'true';
} else {
    $destacado =  'false';
}
if(!empty($_POST['disponible'])){
    $disponible = 'true';
} else {
    $disponible =  'false';
}

$sql = "INSERT INTO platillos (nombre, descripcion, precio, disponible, destacado) VALUES('$nombre', '$descripcion', $precio, $disponible, $destacado)";
if(mysqli_query($con, $sql)){
    header("Location: /proyectodbdw/admin/platillos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/platillos.php'>Regresar</a>");
}
?>