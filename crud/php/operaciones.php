<?php

require_once("db.php");
require_once("componentes.php");

$con = creardb();

if(isset($_REQUEST['create'])){
    insert();
}
if(isset($_REQUEST['update'])){
    update();
}
if(isset($_REQUEST['delete'])){
    delete();
}

function insert(){
    $nombre = $_REQUEST['nombre'];
    $cantidad = $_REQUEST['cantidad'];

    if($cantidad && $nombre){
        
        $sql = "INSERT INTO ingredientes (nombre, cantidad) VALUES('$nombre','$cantidad')";
        if(mysqli_query($GLOBALS['con'], $sql)){
            mensaje("success","Se inserto correctamente");
        }else{
            mensaje("error","Algo salio mal al insertar");
        }
    }else{
        mensaje("error","Hacen falta datos");
    }
}

function read(){
    $sql = "SELECT * FROM ingredientes";
    $resultado = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($resultado) > 0){
        return $resultado;
    }
}

function update(){
    $id = leerCampos("id");
    $nombre = leerCampos("nombre");
    $cantidad = leerCampos("cantidad");

    if($id && $nombre && $cantidad){
        $sql = "
            UPDATE ingredientes SET id='$id', nombre='$nombre',cantidad='$cantidad' WHERE id='$id';
        ";
        if(mysqli_query($GLOBALS['con'],$sql)){
            mensaje('success','Actualizado correctamente');
        }else{
            mensaje('error','Algo salio mal en la actualizacion de datos');
        }
    }else{
        mensaje('error','No selecciono datos para cambiar');
    }
}

function delete(){
    $id = (int)leerCampos("id");
    $sql = "
        DELETE FROM ingredientes WHERE id=$id;
    ";
    if(mysqli_query($GLOBALS['con'],$sql)){
        mensaje('success','Se ha borrado exitosamente');
    }else{
        mensaje('error','No se pudo borrar');
    }
}

function mensaje($clase, $msg){
    $x = "<h6 class = '$clase'>$msg</h6>";
    echo $x;
}

function leerCampos($valor){
    $campo = mysqli_real_escape_string($GLOBALS['con'],$_REQUEST[$valor]);
    if(empty($campo)){
        return false;
    } else{
        return $campo;
    }
}