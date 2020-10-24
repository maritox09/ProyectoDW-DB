<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();
$resultado = mysqli_query($con,"SELECT *, count(*) FROM carrito GROUP BY id_plat");
$id_user = $_SESSION['id'];

if(mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usuarios WHERE id_usuario = $id_user"))['notarjeta'] != null){
    while($row = mysqli_fetch_assoc($resultado)){
        $id_plat = $row['id_plat'];
        $cantidad = $row['count(*)'];
        $ing_plat = mysqli_query($con,"SELECT * FROM plat_ing WHERE id_plat = $id_plat");
        while($rowing = mysqli_fetch_assoc($ing_plat)){
            $temp = $rowing['id_ing'];
            if(empty($ar[$temp])){
                $cant[$temp] = $rowing['cantidad'] * $cantidad;
                $id[$temp] = $temp;
            } else {
                $cant[$temp] = $cant[$temp] + ($rowing['cantidad'] * $cantidad);
                $id[$temp] = $temp;
            }
        }
    }
} else {
    die("Porfavor ingrese una tarjeta de credito en su perfil <a href='/proyectodbdw/perfil.php'>Ir a perfil</a>");
}
foreach($id as $ing){
    if($ing != -1){
        $cantidad_inventario = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ingredientes WHERE id = $ing"))['cantidad'];
        if($cantidad_inventario >= $cant[$ing]){
            $existencia = true;
        } else {
            $existencia = false;
            break;
        }
    }else{return;}
}
if($existencia){
    $query1 = "INSERT INTO pedidos (id_usuario) VALUES ($id_user)";
    mysqli_query($con,$query1);
    $last_id = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS x"))['x'];
    $query2 = "INSERT INTO estadopedidos (id_pedido, estado) VALUES ($last_id,'aceptado')";
    if(mysqli_query($con,$query2)){
        $resultado = mysqli_query($con,"SELECT *, count(*) FROM carrito GROUP BY id_plat");
        while ($tupla = mysqli_fetch_assoc($resultado)){
            for($i = 0; $i < $tupla['count(*)']; $i++){
                $id_plat = $tupla['id_plat'];
                $query3 = "INSERT INTO pedidos_platillos (id_pedido,id_platillos) VALUES ($last_id,$id_plat)";
                if(mysqli_query($con,$query3)){
                } else {
                    die("Algo salio mal <a href='/proyectodbdw/main.php'>Regresar</a>");
                }
            }
        }
    }
}else{
    die("No tenemos inventario suficiente para cubrir su orden <a href='/proyectodbdw/main.php'>Regresar</a>");
}
if(mysqli_query($con,"DELETE FROM carrito")){
    header("Location: /proyectodbdw/orden.php?id=$last_id");
} else {
    die("Algo salio mal <a href='/proyectodbdw/carrito.php'>Regresar</a>");
}
?>