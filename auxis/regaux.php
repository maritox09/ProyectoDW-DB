<?php

//error_reporting(0);

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
    $sql = "SELECT * FROM usuarios WHERE correo = $correo";
    $resultado = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($resultado) > 0){
        return $resultado;
    }
}

function comprobar_telefono(){
    $telefono = $_POST['telefono'];
    $sql = "SELECT * FROM usuarios WHERE correo = $telefono";
    $resultado = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($resultado) > 0){
        return $resultado;
    }
}

function insertar(){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $sql = "INSERT INTO usuarios(nombre, apellido, correo, direccion, telefono, password,) VALUES('$nombre', '$apellido', '$correo', '$direccion', $telefono, '$contrasena')";
    if(mysqli_query($GLOBALS['con'], $sql) == TRUE){
        return TRUE;
    } else{
        return FALSE;
    }
}

if(!comprobar_correo()){
    if(!comprobar_telefono()){
        if($contrasena == $contrasena2){
            if(insertar()){
                header("Location: registrocompleto.php");
            }else{
                echo "algo salio mal en el insertar";
            }
        }else{
            echo "algo salio mal en la contrasena";
        }
    }else{
        $stm = "<h1>Este telefono ya ha sido registrado para otro usuario</h1>";
        echo $stm;
    }
}else{
    $stm = "<h1>Este correo ya ha sido registrado para otro usuario</h1>";
    echo $stm;
    sleep(5);
    
}