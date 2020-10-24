<?php 
require_once './auxis/db.php';
require_once './auxis/componentes.php';
$con = conectardb();
$tiempo = $_GET['menu'];

$sql = "SELECT * FROM tiempo WHERE tiempo = '$tiempo'";
$resultado = mysqli_query($con,$sql);

function displaymenus(){
    $tiempo = $_GET['menu'];
    $fila = "<div class='row'>";
    for($j = 0; $j < mysqli_num_rows($GLOBALS['resultado']);$j++){
        echo $fila;
        for($i = 0; $i < 2; $i++){
            if($row = mysqli_fetch_assoc($GLOBALS['resultado'])){
                $id = $row['id_plat'];
                $sqlTEMP =  "SELECT * FROM platillos WHERE id = $id";
                $temp = mysqli_fetch_assoc(mysqli_query($GLOBALS['con'],$sqlTEMP));
                $nombre = $temp['nombre'];
                $precio = $temp['precio'];
                $desc = $temp['descripcion'];
                $foto = $temp['fotografia'];
                $menu = "<div class='col'>
                    <h1>$nombre <img style='width: 10vw;float: right' src='data:image/jpg; base64,".base64_encode($foto)."'> </h1>
                    <h3>Precio: Q $precio</h3>
                    <p>$desc <input onClick="."redir($id,'$tiempo')"." type='image' src='/proyectodbdw/Assets/mas.png' style = 'float:right; width:3vw;'>
                    </p></div>";
                echo $menu;
            } else {
                return;
            }
        }
        echo "</div>";
    }
}
?>
<script>
    function redir($id_platillo,$tempo){
        $dir = "/proyectodbdw/auxis/agregarcarrito.php?id="+$id_platillo+"&menu="+$tempo;
        window.location.href = $dir;
    }
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Mr. Taco</title>
    <link rel="stylesheet" href="/proyectodbdw/Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php menuprincipal() ?>
    </header>
    <div class="wrapper-menus">
        <?php displaymenus(); ?>
    </div>
    <footer>
        <?php footer() ?>
    </footer>
</body>

</html>