<?php
require_once '../auxis/db.php';
require_once '../auxis/componentes.php';
$con = conectardb();

function read(){
    $sql = "SELECT * FROM platillos";
    $resultado = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($resultado) > 0){
        return $resultado;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Administracion</title>
</head>
<body>
    <header>
        <?php menuindividual(); ?>
    </header>
    <?php permisoempleado(); ?>
    <div>
        <form method="post" action="/proyectodbdw/admin/auxis/insertarplatillo.php" class="platillos">
            Platillo: <input type="text" name="nombre" required>
            Descripcion: <input type="text" name="descripcion" required>
            Precio: <input type="number" name="precio" required>
            Destacado: <input type="checkbox" name="destacado">
            Disponible: <input type="checkbox" name="disponible" checked>
            <input type="submit" value="Ingresar" class="ok">
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Platillo</td>
                    <td>Descripcion</td>
                    <td>Precio</td>
                    <td>Fotografia</td>
                    <td>Destacado</td>
                    <td>Disponible</td>
                    <td>Editar</td>
                    <td>Borrar</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $resultado = read();
                    if($resultado){
                        while($row = mysqli_fetch_assoc($resultado)){?>
                            <tr>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['nombre'];?></td>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['descripcion'];?></td>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['precio'];?></td>
                                <td data-id = "<?php echo $row['id']; ?>"><img style="width: 10vw;" src='data:image/jpg; base64,<?php echo base64_encode($row['fotografia']) ?>'></td>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['destacado'];?></td>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['disponible'];?></td>
                                <td><a href="/proyectodbdw/admin/auxis/editarplatillos.php?id=<?php echo $row['id']?>" class="btn-editar">click</a></td>
                                <td><a href="/proyectodbdw/admin/auxis/borrarplatillos.php?id=<?php echo $row['id']?>" class="btn-editar">click</a></td>
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