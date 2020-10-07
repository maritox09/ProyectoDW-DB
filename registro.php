<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <link rel="stylesheet" href="./Estilos/dist/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="./Assets/logo.jpg" class="logo">
        <a href="./main.php">Inicio</a>
        <a href="">Desayunos</a>
        <a href="">Almuerzos</a>
        <a href="">Cenas</a>
        <a href="">Promocionales</a>
        <a href="">Historia</a>
        <a href="./registro.php">Registro</a>
        <a href="./login.php">Login</a>
    </header>
    <div>
        <form action="./auxis/regaux.php" method="post">
            <h1>Registrate</h1>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Juan" required>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" placeholder="Perez" required>
            <label for="correo">Correo electronico</label>
            <input type="text" name="correo" placeholder="juanperez@gmail.com" required>
            <label for="direccion">Direccion</label>
            <input type="text" name="direccion" placeholder="3 calle 12-65 zona 3" required>
            <label for="telefono">Numero telefonico</label>
            <input type="text" name="telefono" placeholder="55667788" required>
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <label for="contrasena2">Confirme su contraseña</label>
            <input type="password" name="contrasena2" placeholder="Confirme su contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
    </div>
    <footer>
        <a href="">Contactanos</a>
        <img src="./Assets/logotenue.png">
        <a href="">Sucursales</a>
    </footer>
</body>

</html>