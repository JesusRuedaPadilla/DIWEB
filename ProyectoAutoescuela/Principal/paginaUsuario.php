<?php
require_once "../BD/Sesion.php";
require_once "../BD/Usuario.php";
require_once "../BD/Login.php";
require_once "../BD/GBDatos.php";

Sesion::init();
$JSON=GBDatos::obtieneUsuarios();
//var_dump($JSON);



if(isset($_POST['logout'])){

 
    Sesion::destruir();
   
    header("Location:../Inicio.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <script src="https://kit.fontawesome.com/f4af5b899a.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
    <header>
        <nav id="imgPrincipal">
            <img src="../imagenes/autoescuela.png">
        </nav>

        <nav id="navIcono">
        <i class="fas fa-user"></i>
        
        <form action='paginaUsuario.php' method='post'>
            <input id="logout" type='submit' name='logout' value='Cerrar Sesion'/>
        </form>
        </nav>

        <nav>
            <ul>
                
                <li class="categoria">
                    <a href="paginaUsuario.php">Usuarios</a>
                    <ul class="submenu">
                        <li><a href="altaUsuario.php">Alta Usuarios</a></li>
                        <li><a href="#">Alta masiva usuarios</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="#">Tematicas</a>
                    <ul class="submenu">
                        <li><a href="altaTematicas.php">Alta temáticas</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="#">Preguntas</a>
                    <ul class="submenu">
                        <li><a href="altaPreguntas.php">Alta preguntas</a></li>
                        <li><a href="#">Alta masiva Preguntas</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="#">Exámenes</a>
                    <ul class="submenu">
                        <li><a href="#">Alta Exámen</a></li>
                        <li><a href="#">Histórico</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </header>

    <article>
 
    
        
            
                <table>
                    <!-- <caption>Alumnos</caption> -->
                    <tr class="filas">
                        <th class="columnas_cab">Company</th>
                        <th class="columnas_cab">Contact</th>
                        <th class="columnas_cab">Country</th>
                    </tr>
                    <tr class="filas">
                        <td class="columnas">Alfreds Futterkiste</td>
                        <td class="columnas">Maria Anders</td>
                        <td class="columnas">Germany</td>
                    </tr>
                    <tr class="filas">
                        <td class="columnas">Centro comercial Moctezuma</td>
                        <td class="columnas">Francisco Chang</td>
                        <td class="columnas">Mexico</td>
                    </tr>
                </table>
            
            
    </article>

    <footer>
        <div class="continente">
    <div class="cajaizq">
        <a href="">Guia de estilo</a><br>
        <a href="">Mapa web del sitio</a>
</div>

    <div class="cajacent">
        Enlaces relacionados: <br>
        <a href="https://www.dgt.es/inicio/">DGT</a><br>
        <a href="https://sede.dgt.gob.es/es/permisos-de-conducir/examenes-y-pruebas/index.shtml">Solicitud oficial de examen</a>
    </div>

    <div class="cajader">
        Contacto<br>
        Telefono: 953845624<br>
        Email: jijihaha@gmail.com
    </div>
</div> 
    </footer>
</body>
</html>