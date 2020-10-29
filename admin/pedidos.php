<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();
$resultado = mysqli_query($con,"SELECT * FROM estadopedidos")
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
                    <td>Cambiar estado</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $row = mysqli_fetch_assoc($resultado);
                    if($resultado){
                        while($row = mysqli_fetch_assoc($resultado)){?>
                            <tr>
                                <td><?php echo $row['id_pedido'];?></td>
                                <td><?php echo $row['estado'];?></td>
                                <td><a href="/proyectodbdw/admin/auxis/editarestadopedido.php?id=<?php echo $row['id_pedido']?>&estado=<?php echo $row['estado']?>" class="btn-editar">Siguiente</a></td>
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