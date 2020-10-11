<?php

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

$con = conectardb();

$id1 = $_POST['id1'];
$id2 = $_POST['id2'];
$id3 = $_POST['id3'];
$id4 = $_POST['id4'];
$id5 = $_POST['id5'];
$ing1 = $_POST['ingrediente1'];
$ing2 = $_POST['ingrediente2'];
$ing3 = $_POST['ingrediente3'];
$ing4 = $_POST['ingrediente4'];
$ing5 = $_POST['ingrediente5'];
$cant1 = $_POST['cantidad1'];
$cant2 = $_POST['cantidad2'];
$cant3 = $_POST['cantidad3'];
$cant4 = $_POST['cantidad4'];
$cant5 = $_POST['cantidad5'];
$iding1 = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ingredientes WHERE nombre = '$ing1'"))['id'];
$iding2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ingredientes WHERE nombre = '$ing2'"))['id'];
$iding3 = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ingredientes WHERE nombre = '$ing3'"))['id'];
$iding4 = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ingredientes WHERE nombre = '$ing4'"))['id'];
$iding5 = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ingredientes WHERE nombre = '$ing5'"))['id'];
$sql1 = "UPDATE plat_ing SET id_ing = $iding1, cantidad = $cant1 WHERE id = $id1";
$sql2 = "UPDATE plat_ing SET id_ing = $iding2, cantidad = $cant2 WHERE id = $id2";
$sql3 = "UPDATE plat_ing SET id_ing = $iding3, cantidad = $cant3 WHERE id = $id3";
$sql4 = "UPDATE plat_ing SET id_ing = $iding4, cantidad = $cant4 WHERE id = $id4";
$sql5 = "UPDATE plat_ing SET id_ing = $iding5, cantidad = $cant5 WHERE id = $id5";
if(mysqli_query($con,$sql1) and mysqli_query($con,$sql2) and mysqli_query($con,$sql3) and mysqli_query($con,$sql4) and mysqli_query($con,$sql5)){
    header("Location: /proyectodbdw/admin/platillos.php");
} else {
    die("Algo salio mal <a href='/proyectodbdw/admin/platillos.php'>Regresar</a>");
}