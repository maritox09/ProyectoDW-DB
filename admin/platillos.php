<?php
session_start();
if(!empty($_SESSION['id'])){
    $ses = $_SESSION['id'];
    $rol = $_SESSION['rol'];
}else{
    $ses = -1;
    $rol = 'anonimo';
}

if(!empty($_SESSION['id'])){
    if($rol == 'visitante'){
        $a = "<h1>No tiene los permisos necesarios para estar aqui...</h1>";
        $b =  "<a href='./main.php'>Regresar</a>";
        $c =  "";
        $d =  "";
    } elseif($rol == 'empleado'){
        $a = "";
        $b = "";
        $c = "";
        $d = "";
    }elseif($rol == 'admin'){
        $a = "";
        $b = "";
        $c = "";
        $d = "";
    }
}else{
    $a = "<h1>No tiene los permisos necesarios para estar aqui...</h1>";
    $b =  "<a href='./main.php'>Regresar</a>";
    $c =  "";
    $d =  "";
}
function conectardb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyectodbdw";

    $con = mysqli_connect($servername,$username,$password,$dbname);

    if(!$con){
        die("fallo de conexion" .mysqli_connect_error());
    }else{
        return $con;
    }
}
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
        <img src="/proyectodbdw/Assets/logo.jpg" class="logo">
        <a href="/proyectodbdw/main.php">Inicio</a>
        <a href="/proyectodbdw/administrar.php">Regresar</a>
        <a href="/proyectodbdw/auxis/logout.php">Logout</a>
    </header>
    <div>
        <form method="post" action="/proyectodbdw/admin/auxis/insertarplatillo.php" class="platillos">
            Platillo: <input type="text" name="nombre" required>
            Descripcion: <input type="text" name="descripcion" required>
            Precio: <input type="number" name="descripcion" required>
            Destacado: <input type="checkbox" name="descripcion">
            Disponible: <input type="checkbox" name="descripcion" checked>
            <input type="submit" value="Ingresar">
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
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['fotografia'];?></td>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['destacado'];?></td>
                                <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['disponible'];?></td>
                                <td><a href="/proyectodbdw/admin/auxis/editarplatillos.php?id=<?php echo $row['id']?>">click</a></td>
                                <td><a href="/proyectodbdw/admin/auxis/borrarplatillos.php?id=<?php echo $row['id']?>">click</a></td>
                            </tr>
                            <?php
                            }
                        }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="/proyectodbdw/Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>
</html>