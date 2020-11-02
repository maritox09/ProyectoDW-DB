<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();
$id = $_GET['id'];
$sql1 = "SELECT * FROM usuarios WHERE id_usuario = $id";
$sql2 = "SELECT * FROM roles WHERE id_usuario = $id";

$resultado_datos = mysqli_fetch_assoc(mysqli_query($con,$sql1));
$resultado_roles = mysqli_fetch_assoc(mysqli_query($con,$sql2));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Editar usuario</title>
</head>
<body>
    <header>
        <?php menuindividual(); ?>
    </header>
    <?php permisousuario(); ?>
    <div class="wrapper-platillos"> 
        <form action="/proyectodbdw/admin/auxis/editplat.php"  class="editar" method="post" enctype="multipart/form-data">
            <h3>Datos del usuario</h3>
            <input type="hidden" name="id" value="<?php echo $resultado_datos['id_usuario']; ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $resultado_datos['nombre']; ?>">
            Apellido: <input type="text" name="apellido" value="<?php echo $resultado_datos['apellido']; ?>">
            Correo: <input type="text" name="correo" value="<?php echo $resultado_datos['correo']; ?>">
            Rol: <input list="roles" name="rol" placeholder="<?php echo $resultado_roles['rol']; ?>" required>
            <datalist id="roles">
                <option>empleado</option>
                <option>admin</option>
                <option>visitante</option>
            </datalist>
            <input type="submit" value="Actualizar" class="ok">
        </form>
        <form class="editar" action="/proyectodbdw/admin/auxis/resetpassword.php" method="post">
            <input type="hidden" name="id" value="<?php echo $resultado_datos['id_usuario']?>">
            <input type="submit" value="Resetear contraseña" class="error">
        </form>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>