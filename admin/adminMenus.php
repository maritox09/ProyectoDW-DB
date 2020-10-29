<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';

$con = conectardb();
$tiempo = $_GET['menu'];

$resultado = mysqli_query($con, "SELECT * FROM tiempo WHERE tiempo = '$tiempo'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar <?php echo $tiempo ?>s</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php menuadmin(); ?>
    </header>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Platillos</td>
                    <td>Menu</td>
                    <td>Cambiar de Menu</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($resultado){
                        while($row = mysqli_fetch_assoc($resultado)){
                            $id = $row['id_plat'];
                            $sql = "SELECT * FROM platillos WHERE id = $id";
                            $temp = mysqli_fetch_assoc(mysqli_query($con,$sql));
                            ?>
                            <tr>
                                <td><?php echo $temp['nombre'];?></td>
                                <td><?php echo $row['tiempo'];?></td>
                                <td><a href="/proyectodbdw/admin/auxis/cambiardemenu.php?id=<?php echo $row['id_plat']?>&nombre=<?php echo $temp['nombre']?>" class="btn-editar">cambiar de menu</a></td>
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