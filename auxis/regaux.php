<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

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

function comprobar_correo(){
    $correo = $_POST['correo'];
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    if(mysqli_num_rows(mysqli_query($GLOBALS['con'], $sql)) > 0){
        return true;
    } else{
        return false;
    }
}

function comprobar_telefono(){
    $telefono = $_POST['telefono'];
    $sql = "SELECT * FROM usuarios WHERE telefono = '$telefono'";
    if(mysqli_num_rows(mysqli_query($GLOBALS['con'], $sql)) > 0){
        return true;
    } else{
        return false;
    }
}

function insertar(){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $sql1 = "INSERT INTO usuarios(nombre, apellido, correo, direccion, telefono, password) VALUES('$nombre', '$apellido', '$correo', '$direccion', $telefono, '$contrasena')";
    $sql2 = "INSERT INTO roles VALUES(LAST_INSERT_ID(), 'visitante')";
    if(mysqli_query($GLOBALS['con'], $sql1) && mysqli_query($GLOBALS['con'],$sql2)){
        return true;
    } else{
        return FALSE;
    }
}

$con = conectardb();

if(!comprobar_correo()){
    if(!comprobar_telefono()){
        if($contrasena == $contrasena2){
            if(insertar()){
                header("Location: /proyectodbdw/login.php?msg=ok");
            }else{
                header("Location: /proyectodbdw/registro.php?msg=no");
            }
        }else{
            header("Location: /proyectodbdw/registro.php?msg=cr");
        }
    }else{
        header("Location: /proyectodbdw/registro.php?msg=tl");;
    }
}else{
    header("Location: /proyectodbdw/registro.php?msg=em");;
}