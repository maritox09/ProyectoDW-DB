<?php
require_once("./php/componentes.php");
require_once("./php/operaciones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./Proyectodbdw/Estilos/dist/main.css">
</head>
<body>
    <div class="container text-center">
        <h1>Ingredientes</h1>
    </div>
    <div class="container text-center">
        <form action ="" method="">
            <div class="row">
                ID: <?php input('ID','id','readonly'); ?>
            </div>
            <div class="row">
                Nombre: <?php input('Nombre','nombre',''); ?>
            </div>
            <div class="row">
                Cantidad: <?php input('Cantidad','cantidad',''); ?>
            </div>
            <div class="d-flex justify-content-center">
                <?php boton("btn-create","create","Crear",'none'); ?>
                <?php boton('btn-read','read','Leer','none'); ?>
                <?php boton('btn-update','update','Actualizar','none'); ?>
                <?php boton('btn-delete','delete','Borrar','none'); ?>
            </div>
        </form>
    </div>
    <div class="container text-center d-flex justify-content-center">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_REQUEST['read'])){
                    $resultado = read();
                        if($resultado){
                            while($row = mysqli_fetch_assoc($resultado)){?>
                                <tr>
                                    <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['id'];?></td>
                                    <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['nombre'];?></td>
                                    <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['cantidad'];?></td>
                                    <td><i class="fas fa-edit btnedit" data-id = "<?php echo $row['id']; ?>"></i></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="./php/main.js"></script>
</body>
</html>