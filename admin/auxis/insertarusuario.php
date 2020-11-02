<?php 
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];
$sql1 = "INSERT INTO usuarios (nombre, apellido, correo, password) VALUES ('$nombre','$apellido','$correo','123')";
$sql2 = "INSERT INTO roles VALUES (LAST_INSERT_ID(),'$rol')";

if(mysqli_query($con,$sql1) and mysqli_query($con,$sql2)){
    header("Location: /proyectodbdw/admin/usuarios.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/usuarios.php'>Regresar</a>");
}
?>