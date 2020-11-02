<?php
session_start();
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con =  conectardb();

function comprobar(){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($resultado) > 0){
        $row = mysqli_fetch_assoc($resultado);
        if($row['activo'] == 0){
            header("Location: /proyectodbdw/login.php?msg=inc");
        } else {
            if($row['correo'] == $correo){
                if($row['password'] == $contrasena){
                    return ($row['id_usuario']);
                } else {
                    header("Location: /proyectodbdw/login.php?msg=nocr");
                }
            }
        }
    } else{
        header("Location: /proyectodbdw/login.php?msg=nous");
    }
}

function rol($id){
    $sql = "SELECT * FROM roles WHERE id_usuario = $id";
    $resultado = mysqli_query($GLOBALS['con'], $sql);
    $row = mysqli_fetch_assoc($resultado);
    return ($row['rol']);
}

$comp = comprobar();
$rol = rol($comp);
$_SESSION["id"] = $comp;
$_SESSION["rol"] = $rol;

mysqli_query($con,"UPDATE usuarios SET last_login = CURDATE() WHERE id_usuario = $comp");

if(!empty($_SESSION['id'])){
    header("Location: /proyectodbdw/main.php");
}