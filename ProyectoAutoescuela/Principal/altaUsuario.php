<?php
require_once "../BD/Usuario.php";
require_once "../BD/Login.php";
require_once "../BD/Sesion.php";
require_once "../BD/GBDatos.php";
require_once "../mail.php"; 
      
 
    Sesion::init();
    if(isset($_POST['logout'])){

        Sesion::destruir();
        header("Location:../Inicio.php");
    }
    if (isset($_POST['enviar']))
    {
        
        $correo = $_POST['correo'];
        $nombre= $_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $fecha_nac=$_POST['fecha_nac'];
        $contrasena= Usuario::contraseñaAleatoria();
        $Rol=$_POST['Rol'];
      


        if(GBDatos::IniciaConex() && $correo && $nombre && $apellidos && $fecha_nac && $Rol){

            // GBDatos::insertHashCorreo($hash,$correo);

            $hash=md5($correo);

            GBDatos::InsertarUsuario($correo,$nombre,$apellidos,$fecha_nac,$contrasena,$Rol,$hash);
         
            
                mandaEmail($correo,"Cambiar contraseña","<a href='http://localhost/Proyectos/ProyectoAutoescuela/Principal/cambioContrase%c3%b1a.php?id=$hash'>Pulsa para cambiar contraseña</a>");    
            //     //inserto en base de datos el campo activo como falso 
            //     //envio el correo de cambio de contraseña
            //     //despues cuando el usuario cambie la contraseña activo= true y se actualiza la base de datos con la contraseña buena
            //     //poner que mientras activo sea falso no se puede iniciar sesion aunque se conozca la contraseña aleatoria
             
        }
        else{
            echo "<section class='Error'>Error compruebe los datos introducidos</section>";
        }

      
             
    }
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
  <title>Alta Usuario</title>
  <link rel="stylesheet" href="../css/paginaPrincipal.css">
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
            <form action='altaUsuario.php' method='post'>
            
            
                    <label for='correo' >Email:</label><br/>
                    <input type='email' name='correo' id='correo' maxlength="50" /><br/>
               
                    
                    <label for='nombre' >Nombre:</label><br/>
                    <input type='text' name='nombre' id='nombre' maxlength="50" /><br/>
              
                    
                    <label for='apellidos' >Apellidos:</label><br/>
                    <input type='text' name='apellidos' id='apellidos' maxlength="50" /><br/>
              
                    
                    <label for='fecha_nac' >Fecha Nacimiento:</label><br/>
                    <input type='date' name='fecha_nac' id='fecha_nac' maxlength="50" /><br/>
                    
              
                    
                    <label for='Rol' >Rol :</label><br/>
                    <select  name='Rol' id='Rol' maxlength="50"><br/>
                        <option value="Profesor">Profesor</option>
                        <option value="Alumno">Alumno</option>
                    </select>

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