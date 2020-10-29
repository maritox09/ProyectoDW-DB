<?php
require_once '../auxis/componentes.php';
require_once '../auxis/db.php';
$con = conectardb();

function read(){
    $sql = "SELECT * FROM ingredientes";
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
        <form method="post" action="/proyectodbdw/admin/auxis/insertaringrediente.php" class="ingredientes">
            Ingrediente: <input type="text" name="nombre" required>
            Cantidad: <input type="text" name="cantidad" required>
            <input type="submit" value="Ingresar" class="ok">
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Ingrediente</td>
                    <td>Cantidad</td>
                    <td>Editar</td>
                    <td>Borrar</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $resultado = read();
                    $row = mysqli_fetch_assoc($resultado);
                    if($resultado){
                        while($row = mysqli_fetch_assoc($resultado)){?>
                            <tr>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['nombre'];?></td>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['cantidad'];?></td>
                                <td><a href="/proyectodbdw/admin/auxis/editaringrediente.php?id=<?php echo $row['id']?>" class="btn-editar">Click para editar</a></td>
                                <td><a href="/proyectodbdw/admin/auxis/borraringrediente.php?id=<?php echo $row['id']?>" class="btn-editar">click para borrar</a></td>
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