import React from 'react';
import logo from './logo.jpg';
import './main.css';

function App(){
    return(
        <header>
            <img src={logo} className='logo'></img>
            <a href='http://localhost/proyectodbdw/main.php'>Inicio</a>
            <a href='http://localhost/proyectodbdw/menus.php?menu=desayuno'>Desayunos</a>
            <a href='http://localhost/proyectodbdw/menus.php?menu=almuerzo'>Almuerzos</a>
            <a href='http://localhost/proyectodbdw/menus.php?menu=cena'>Cenas</a>
            <a href='http://localhost/proyectodbdw/destacados.php'>Destacados</a>
            <a href='http://localhost:3000/'>Historia</a>
        </header>
    );
}

export default App;