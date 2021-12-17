<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <script src="https://kit.fontawesome.com/f4af5b899a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../favicon.ico">

</head>
<body>
    <header>
        <nav id="imgPrincipal">
            <img src="../imagenes/autoescuela.png">
        </nav>

        <nav id="navIcono">
        <i class="fas fa-user"></i>
        <form action='altaTematicas.php' method='post'>

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
                        <li><a href="#">Alta temáticas</a></li>
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
 
        <section>
            <form action='altaTematicas.php' method='post'>
    
               
                    <label for='tema' >Temática:</label><br/>
                    <input type='text' name='tema' id='tema' maxlength="50" /><br/>
                
                
          
            <input type='submit' name='enviar' value='Aceptar'/><br/>
       
            </form>

       
        </section>
    
    </article>
    <footer>
        <div class="continente">
    <div class="cajaizq">
        <a href="">Guia de estilo</a><br>
        <a href="">Mapa web del sitio</a>
</div>

    <div class="cajacent">
        Enlaces relacionados<br>
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
<?php
require_once "../BD/Sesion.php";
require_once "../BD/Usuario.php";
require_once "../BD/Login.php";
require_once "../BD/GBDatos.php";

Sesion::init();

if(isset($_POST['logout'])){

    Sesion::destruir();
    header("Location:../Inicio.php");
}
if (isset($_POST['enviar']))
{
    
    $tema = $_POST['tema'];
    
    $activo=0;

    if(GBDatos:: IniciaConex()){
    
           
        if(GBDatos::existeTematicas($tema)!=1){
            GBDatos::InsertarTematica($tema);
            
        }
        else if(GBDatos::existeTematicas($tema)){
            echo "<section class='Error'>Error Tematica ya existente</section>";
        }
        
    }

}
?>