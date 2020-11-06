import logo from './logo.svg';
import './App.css';
import './main.css';
import MenuPrincipal from './header';
import MenuFooter from './footer';
import Contenido from './contenido';


function App() {
  return (
    <div className="App">
      <MenuPrincipal/>
      <Contenido/>
      <MenuFooter/>
    </div>
  );
}

export default App;
