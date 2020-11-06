import React from 'react';
import logo from './logotenue.png';
import './main.css';

function App(){
    return(
        <footer>
            <a href='/proyectodbdw/contacto.php'>Contactanos</a>
            <a href='/proyectodbdw/FAQ.php'>FAQ</a>
            <img src={logo}></img>
            <a href=''></a>
            <a href='/proyectodbdw/auxis/revisapedido.php'>Revisa tu pedido</a>
        </footer>
    );
}

export default App;