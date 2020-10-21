<?php
require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();

$id = $_GET['id'];
$sql = "SELECT * FROM plat_ing WHERE id_plat = $id";
$resultado1 = mysqli_query($con,$sql);
$sql2 = "SELECT * FROM platillos WHERE id = $id";
$resultado2 = mysqli_query($con,$sql2);
$sql3 = "SELECT * FROM ingredientes";
$resultado3 = mysqli_query($con,$sql3);
$row = mysqli_fetch_assoc($resultado2);

if($row['disponible']){
    $disp = 'checked';
} else {
    $disp = '';
}
if($row['destacado']){
    $dest = 'checked';
} else {
    $dest = '';
}

if(mysqli_num_rows($resultado1) < 1){
    for ($i = 1; $i <= 5; $i++) {
        $sql2 = "INSERT INTO plat_ing(id_plat, id_ing, cantidad) VALUES ($id, NULL, 0)";
        mysqli_query($con,$sql2);
    }
}

$ing1 = mysqli_fetch_assoc($resultado1);
$ing2 = mysqli_fetch_assoc($resultado1);
$ing3 = mysqli_fetch_assoc($resultado1);
$ing4 = mysqli_fetch_assoc($resultado1);
$ing5 = mysqli_fetch_assoc($resultado1);

if(!empty($ing1['id_ing'])){
    $plat1 = $ing1['id_ing'];
} else {
    $plat1 = -1;
}
if(!empty($ing2['id_ing'])){
    $plat2 = $ing2['id_ing'];
} else {
    $plat2 = -1;
}
if(!empty($ing3['id_ing'])){
    $plat3 = $ing3['id_ing'];
} else {
    $plat3 = -1;
}
if(!empty($ing4['id_ing'])){
    $plat4 = $ing4['id_ing'];
} else {
    $plat4 = -1;
}
if(!empty($ing5['id_ing'])){
    $plat5 = $ing5['id_ing'];
} else {
    $plat5 = -1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Editar <?php echo $row['nombre']; ?></title>
</head>
<body>
    <header>
        <?php menuindividual(); ?>
    </header>
    <?php permisoempleado(); ?>
    <div class="platillo"> 
        <form action="/proyectodbdw/admin/auxis/editplat.php"  class="editar" method="post">
            <h3>Datos del platillo</h3>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
            Descripcion: <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>">
            Precio: <input type="text" name="precio" value="<?php echo $row['precio']; ?>">
            Fotografia: <input type="file" name="foto" value="<?php echo $row['fotografia']; ?>">
            Disponible: <input type="checkbox" name="disponible" <?php echo $disp ?>>
            Destacado: <input type="checkbox" name="destacado" <?php echo $dest ?>>
            <input type="submit" value="Actualizar">
        </form>
        <form action="/proyectodbdw/admin/auxis/editplating.php"  class="editar" method="post">
            <div class="platillo">
                <div class="editar">
                    <h3>Ingredientes</h3>
                    Ingrediente 1: <input list="ingredientes" name="ingrediente1" value="<?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ingredientes WHERE id = $plat1"))['nombre']; ?>">
                    Ingrediente 2: <input list="ingredientes" name="ingrediente2" value="<?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ingredientes WHERE id = $plat2"))['nombre']; ?>">
                    Ingrediente 3: <input list="ingredientes" name="ingrediente3" value="<?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ingredientes WHERE id = $plat3"))['nombre']; ?>">
                    Ingrediente 4: <input list="ingredientes" name="ingrediente4" value="<?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ingredientes WHERE id = $plat4"))['nombre']; ?>">
                    Ingrediente 5: <input list="ingredientes" name="ingrediente5" value="<?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ingredientes WHERE id = $plat5"))['nombre']; ?>">
                    <datalist id="ingredientes">
                        <?php  
                            while($ingres = mysqli_fetch_assoc($resultado3)){
                                $x = $ingres['nombre'];
                                echo "<option value='$x'>";
                            }
                        ?>
                    </datalist>
                </div>
                <div class="editar"> 
                    <h3>Cantidades</h3>
                    Ingrediente 1: <input list="number" name="cantidad1" value="<?php echo $ing1['cantidad']; ?>">
                    Ingrediente 2: <input list="number" name="cantidad2" value="<?php echo $ing2['cantidad']; ?>">
                    Ingrediente 3: <input list="number" name="cantidad3" value="<?php echo $ing3['cantidad']; ?>">
                    Ingrediente 4: <input list="number" name="cantidad4" value="<?php echo $ing4['cantidad']; ?>">
                    Ingrediente 5: <input list="number" name="cantidad5" value="<?php echo $ing5['cantidad']; ?>">
                    <input type="hidden" name="id1" value="<?php echo $ing1['id']; ?>">
                    <input type="hidden" name="id2" value="<?php echo $ing2['id']; ?>">
                    <input type="hidden" name="id3" value="<?php echo $ing3['id']; ?>">
                    <input type="hidden" name="id4" value="<?php echo $ing4['id']; ?>">
                    <input type="hidden" name="id5" value="<?php echo $ing5['id']; ?>">
                </div>
            </div>
            <input type="submit" value="Actualizar">
        </form>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>