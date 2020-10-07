<?php

session_start();

function conectardb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyectodbdw";

    $con = mysqli_connect($servername,$username,$password,$dbname);

    if(!$con){
        die("fallo de conexion" .mysqli_connect_error());
    }else{
        return $con;
    }
}

$con =  conectardb();

function comprobar(){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($resultado) > 0){
        $row = mysqli_fetch_assoc($resultado);
        if($row['correo'] == $correo){
            if($row['password'] == $contrasena){
                return ($row['id_usuario']);
            } else {
                header("Location: /proyectodbdw/login.php?msg=nocr");
            }
        }
    } else{
        header("Location: /proyectodbdw/login.php?msg=nous");
    }
}
$comp = comprobar();
$_SESSION["id"] = $comp;
header("Location: /proyectodbdw/main.php");