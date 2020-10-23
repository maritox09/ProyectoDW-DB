<?php 
session_start();
if(!empty($_SESSION['id'])){
    $ses = $_SESSION['id'];
    $rol = $_SESSION['rol'];
}else{
    $ses = -1;
    $rol = 'anonimo';
}

function menuprincipal(){
    $carrito = "<a href='/proyectodbdw/carrito.php'>Carrito</a>";
    $logout =  "<a href='/proyectodbdw/auxis/logout.php'>Logout</a>";
    $perfil = "<a href='/proyectodbdw/perfil.php'>Perfil</a>";
    $administrar = "<a href='/proyectodbdw/administrar.php'>Administrar</a>";
    $registro = "<a href='/proyectodbdw/registro.php'>Registro</a>";
    $login = "<a href='/proyectodbdw/login.php'>LogIn</a>";
    $menu = "<img src='/proyectodbdw/Assets/logo.jpg' class='logo'>
        <a href='./main.php'>Inicio</a>
        <a href='/proyectodbdw/menus.php?menu=desayuno'>Desayunos</a>
        <a href='/proyectodbdw/menus.php?menu=almuerzo'>Almuerzos</a>
        <a href='/proyectodbdw/menus.php?menu=cena'>Cenas</a>
        <a href=''>Promocionales</a>
        <a href=''>Historia</a>";

    if($GLOBALS['ses'] != -1){
        if($GLOBALS['rol'] == 'visitante'){
            echo $menu;
            echo $perfil;
            echo $carrito;
            echo $logout;
        } elseif($GLOBALS['rol'] == 'empleado'  or $GLOBALS['rol'] == 'admin'){
            echo $menu;
            echo $perfil;
            echo $administrar;
            echo $logout;
        }
    }else{
        echo $menu;
        echo $registro;
        echo $login;
    }
}

function menuadmin(){
    $menu = "<img src='/proyectodbdw/Assets/logo.jpg' class='logo'>
    <a href='/proyectodbdw/main.php'>Inicio</a>
    <a href='/proyectodbdw/auxis/logout.php'>Logout</a>";
    echo $menu;
}

function menuindividual(){
    $menu = "<img src='/proyectodbdw/Assets/logo.jpg' class='logo'>
    <a href='/proyectodbdw/main.php'>Inicio</a>
    <a href='/proyectodbdw/administrar.php'>Regresar</a>
    <a href='/proyectodbdw/auxis/logout.php'>Logout</a>";
    echo $menu;
}

function footer(){
    $footer = "<a href='/proyectodbdw/contacto.php'>Contactanos</a>
        <a href='/proyectodbdw/FAQ.php'>FAQ</a>
        <img src='/proyectodbdw/Assets/logotenue.png'>
        <a href=''>Sucursales</a>
        <a href=''>Revisa tu pedido</a>";
    echo $footer;
}

function permisoempleado(){
    if($GLOBALS['ses'] != -1){
        if($GLOBALS['rol'] == 'empleado'  or $GLOBALS['rol'] == 'admin'){
            return;
        }
    }else{
        die("<body><h1>No tiene los permisos necesarios para estar aqui... </h1><a href='/proyectodbdw/main.php'>Regresar</a></body>");
    }
}

function permisoadmin(){
    if($GLOBALS['ses'] != -1){
        if($GLOBALS['rol'] == 'admin'){
            return;
        }
    }else{
        die("<body><h1>No tiene los permisos necesarios para estar aqui... </h1><a href='/proyectodbdw/main.php'>Regresar</a></body>");
    }
}

function permisousuario(){
    if($GLOBALS['ses'] != -1){
        if($GLOBALS['rol'] == 'empleado'  or $GLOBALS['rol'] == 'admin' or $GLOBALS['rol'] == 'usuario'){
            return;
        }
    }else{
        die("<body><h1>No tiene los permisos necesarios para estar aqui... </h1><a href='/proyectodbdw/main.php'>Regresar</a></body>");
    }
}

function navadministrar(){
    if($GLOBALS['rol'] == 'empleado'){
        echo "<a href='/proyectodbdw/admin/ingredientes.php'>Ingredientes</a><a href='/proyectodbdw/admin/platillos.php'>Platillos</a><a href='/proyectodbdw/admin/menus.php'>Menus</a>";
    }elseif($GLOBALS['rol'] == 'admin'){
        echo "<a href='/proyectodbdw/admin/ingredientes.php'>Ingredientes</a><a href='/proyectodbdw/admin/platillos.php'>Platillos</a><a href='/proyectodbdw/admin/menus.php'>Menus</a><a href='/proyectodbdw/admin/usuarios.php'>Usuarios</a>";
    }
}
?>