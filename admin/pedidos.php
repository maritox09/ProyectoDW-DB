<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();
$resultado = mysqli_query($con,"SELECT * FROM estadopedidos");
$resultado2 = mysqli_query($con,"SELECT * FROM pedidos");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar pedidos</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php menuindividual(); ?>
    </header>
    <?php permisoempleado(); ?>
    <div>
        <table>
            <thead>
                <tr>
                    <td>No. de pedido</td>
                    <td>Estado</td>
                    <td>Comentario</td>
                    <td>Cambiar estado</td>
                    <td>Cambiar comentario</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($resultado){
                        while($row = mysqli_fetch_assoc($resultado) and $row2 = mysqli_fetch_assoc($resultado2)){?>
                            <tr>
                                <td><?php echo $row['id_pedido'];?></td>
                                <td><?php echo $row['estado'];?></td>
                                <td><?php echo $row2['comentario'];?></td>
                                <td><a href="/proyectodbdw/admin/auxis/editarestadopedido.php?id=<?php echo $row['id_pedido']?>&estado=<?php echo $row['estado']?>" class="btn-editar">Siguiente</a></td>
                                <td><a href="/proyectodbdw/admin/auxis/editarcomentario.php?id=<?php echo $row['id_pedido']?>" class="btn-editar">Click</a></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>