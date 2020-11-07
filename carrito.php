<?php

require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();
$resultado = mysqli_query($con,"SELECT *, count(*) FROM carrito GROUP BY id_plat");
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header><?php menuprincipal(); ?></header>
    <div class="wrapper-platillos">
    <table>
            <thead>
                <tr>
                    <td>Platillo</td>
                    <td>Descripcion</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Subtotal</td>
                    <td>Eliminar del carrito</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($resultado){
                        while($row = mysqli_fetch_assoc($resultado)){
                            $idtemp = $row['id_plat'];
                            $sqltemp = "SELECT * FROM platillos WHERE id = $idtemp";
                            $temp = mysqli_fetch_assoc(mysqli_query($con,$sqltemp));
                            $subtotal = $row['count(*)']*$temp['precio'];
                            $total = $total + $subtotal;
                            ?>
                            <tr>
                                <td><?php echo $temp['nombre'];?></td>
                                <td><?php echo $temp['descripcion'];?></td>
                                <td><?php echo $row['count(*)'];?></td>
                                <td>Q <?php echo $temp['precio'];?></td>
                                <td>Q <?php echo $subtotal;?></td>
                                <td><a href="/proyectodbdw/auxis/quitardecarrito.php?id=<?php echo $idtemp?>">click para eliminar</a></td>
                            </tr>
                            <?php
                            }
                        }
                ?>
                <tr>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>TOTAL:</td>
                                <td>Q <?php echo $total;?></td>
                                <td><a href="/proyectodbdw/auxis/vaciarcarrito.php">Vaciar carrito de compras</a></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <input type="button" onclick="redir()" value="Confirmar orden" class="ok">
            </div>
        </div>
    </div>
    <footer><?php footer(); ?></footer>
    <script>
    function redir(){
        $dir = "/proyectodbdw/auxis/confirmarorden.php";
        window.location.href = $dir;
    }
</script>
</body>
</html>