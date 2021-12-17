<?php
    include_once "../BD/GBDatos.php";


    if(GBDatos::IniciaConex()){

    if(isset($_POST['tema'])){

        $tematica=$_POST['tema'];

        if(isset($_POST['Enviar'])){

            if(GBDatos::ExisteTematica($tematica)){
            
                GBDatos::EliminaTematica($tematica);

        }
        else{
            echo "La tematica no existe.";
        }
    }
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
  <title>Alta Usuario</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="shortcut icon" href="favicon/favicon1.ico">
  <script src="https://kit.fontawesome.com/f4af5b899a.js" crossorigin="anonymous"></script>
  </head>

<body>
<header>
        <nav id="imgPrincipal">
            <img src="../imagenes/autoescuela.png">
        </nav>

        <nav id="navIcono">
        <i class="fas fa-user"></i>
        <form action='altaUsuario.php' method='post'>
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
        <section>
        <form action="" method="post">
        <p>Tematica a eliminar</p>
        <input type="text" name="tema" id="tema">
        <input type="submit" name="Enviar" value="Enviar">
    </form>

        </section>
    </article>
    <footer>
        <div class="continente">
    <div class="cajaizq">
        <a href="../Guia/Guía de Estilos.pdf">Guia de estilo</a><br>
        <a href="../MapaWeb/mapaWeb.php">Mapa web del sitio</a>
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
