<?php
require_once './auxis/db.php';
require_once './auxis/componentes.php';
$con = conectardb();
$sql = "SELECT * FROM platillos WHERE destacado = true";
$resultado = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($resultado);
$foto = $row['fotografia'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mr. Taco</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php menuprincipal(); ?>
    </header>
    <div class="busqueda">
        <form action="/proyectodbdw/buscar.php" method="post">
            <input type="text" name="busca" placeholder="buscar">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <div class="slider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php echo "<img src='data:image/jpg; base64,".base64_encode($foto)."'>"; ?>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $row['nombre']; ?></h5>
                        <p><?php echo $row['descripcion']; ?></p>
                    </div>
                </div>
                <?php while ($row = mysqli_fetch_assoc($resultado)){ $foto = $row['fotografia'];?>
                <div class="carousel-item">
                    <?php echo "<img src='data:image/jpg; base64,".base64_encode($foto)."'>"; ?>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $row['nombre']; ?></h5>
                        <p><?php echo $row['descripcion']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="resto">
        <a href="/proyectodbdw/menus.php?menu=desayuno"><img src="./Assets/desayunos.jpg"></a>
        <a href="/proyectodbdw/menus.php?menu=almuerzo"><img src="./Assets/almuerzos.jpg"></a>
        <a href="/proyectodbdw/menus.php?menu=cena"><img src="./Assets/cenas.jpg"></a>
    </div>
    <footer>
    <?php footer(); ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>