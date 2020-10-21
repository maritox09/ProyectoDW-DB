<?php
require_once './componentes.php';
require_once './db.php';
$con = conectardb();
$id = $_POST['id'];
$actual = $_POST['actual'];
$nuevo = $_POST['nueva'];
$nuevo2 = $_POST['nueva2'];

if(mysqli_query($con, "SELECT * FROM usuarios WHERE password = $actual")){
    if($nuevo == $nuevo2){
        if(mysqli_query($con, "UPDATE usuarios SET password = '$nuevo' WHERE id_usuario = $id")){
            header("Location: /proyectodbdw/perfil.php");
        }else{
            die("<body><h1>Algo salio mal...</h1><body> <a href='/proyectodbdw/perfil.php'>Regresar</a>");
        }
        
    } else {
        die("<body><h1>Su nueva contraseña no coincide</h1><body> <a href='/proyectodbdw/perfil.php'>Regresar</a>");
    }
} else {
    die("<body><h1>Contraseña actual incorrecta</h1><body> <a href='/proyectodbdw/perfil.php'>Regresar</a>");
}
?>