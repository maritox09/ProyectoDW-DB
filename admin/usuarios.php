<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();

$resultado = mysqli_query($con,"SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_usuario = roles.id_usuario ORDER BY rol DESC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Administar usuarios</title>
</head>
<body>
    <header>
        <?php menuindividual(); ?>
    </header>
    <?php permisoadmin(); ?>
    <div>
        <form method="post" action="/proyectodbdw/admin/auxis/insertarusuario.php" class="ingredientes">
            Nombre: <input type="text" name="nombre" required>
            Apellido: <input type="text" name="apellido" required>
            Correo: <input type="text" name="correo" required>
            Rol: <input list="roles" name="rol" required>
            <datalist id="roles">
                <option>empleado</option>
                <option>admin</option>
            </datalist>
            <input type="submit" value="Ingresar" class="ok">
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Correo</td>
                    <td>Direccion</td>
                    <td>Rol</td>
                    <td>Activo</td>
                    <td>Editar Usuario</td>
                    <td>Inactivar / activar</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($resultado){
                        while($row = mysqli_fetch_assoc($resultado)){?>
                            <tr>
                                <td><?php echo $row['nombre'];?></td>
                                <td><?php echo $row['apellido'];?></td>
                                <td><?php echo $row['correo'];?></td>
                                <td><?php echo $row['direccion'];?></td>
                                <td><?php echo $row['rol'];?></td>
                                <td><?php echo $row['activo'];?></td>
                                <td><a href="/proyectodbdw/admin/auxis/editarusuario.php?id=<?php echo $row['id_usuario']?>" class="btn-editar">Click para editar</a></td>
                                <td><a href="/proyectodbdw/admin/auxis/inactivar.php?id=<?php echo $row['id_usuario']?>&estado=<?php echo $row['activo'];?>" class="btn-editar">Cambiar</a></td>
                            </tr>
                            <?php
                            }
                        }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>