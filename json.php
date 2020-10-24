<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
$con = conectardb();
$data = array();
$resultado = mysqli_query($con, "SELECT id, nombre, descripcion, precio FROM platillos");

while($row = mysqli_fetch_assoc($resultado)){
    $data['datos'][] = $row;
}
$json =  json_encode($data);
echo $json;