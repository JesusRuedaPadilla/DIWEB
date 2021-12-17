<?php
require_once "../BD/Usuario.php";
require_once "../BD/Login.php";
require_once "../BD/Sesion.php";
require_once "../BD/GBDatos.php";
require_once "../mail.php"; 
      
 
    Sesion::init();
    if (isset($_POST['enviar']))
    {
        
        $correo = $_POST['correo'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $fecha_nac=$_POST['fecha_nac'];
        $contrasena= Usuario::contraseñaAleatoria();
        $Rol=$_POST['Rol'];
      
        $activo=0;

        if(GBDatos:: IniciaConex()){

            GBDatos::InsertarUsuario($correo,$nombre,$apellidos,$fecha_nac,$contrasena,$Rol,$activo);
        }

      
        if($activo==0){
            $hash=md5($correo);
            $hash1=md5($contrasena);
            GBDatos::insertHashCorreo($hash,$correo);
            GBDatos::insertHashContraseña($hash,$contrasena);
            mandaEmail($correo,"Cambiar contraseña","<a href='http://localhost/Proyectos/ProyectoAutoescuela/Principal/cambioContrase%c3%b1a.html?id=$hash&contrasena=$hash1'>Pulsa para cambiar contraseña</a>");    
        //     //inserto en base de datos el campo activo como falso 
        //     //envio el correo de cambio de contraseña
        //     //despues cuando el usuario cambie la contraseña activo= true y se actualiza la base de datos con la contraseña buena
        //     //poner que mientras activo sea falso no se puede iniciar sesion aunque se conozca la contraseña aleatoria
        }        
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
  <title>Alta Usuario</title>
  <link rel="stylesheet" href="css/paginaPrincipal.css">
  <script src="https://kit.fontawesome.com/f4af5b899a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/main.css">
  </head>

<body>
<header>
        <nav id="imgPrincipal">
        <form action='altaTematicas.php' method='post'>
            <img src="../imagenes/autoescuela.png">
        </form>
        </nav>

        <nav id="navIcono">
        <i class="fas fa-user"></i>
        
        <input id="logout" type='submit' name='logout' value='Cerrar Sesion'/>
           <!-- <input type='submit' name='logout' id="logout" value='Cerrar Sesion'/> -->
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
            
            
            <form method="post" action="altaUsuario.php" onsubmit="return ValidateForm();">
  


<script type="text/javascript">
function ValidateForm()
{
    var radioButtons = document.getElementsByName("favorite_pet");
    for(var i = 0; i < radioButtons.length; i++)
    {
        if(radioButtons[i].checked == true)
        {
            if(confirm("You have selected " + radioButtons[i].value + " as your favorite pet. Is that correct?"))
                return true;
            else
                return false;
        }
    }
}
</script>

                    <label for='tematica' >Tematica:</label><br/>
                    <select  name='tematica' id='tematica' maxlength="50"><br/>
                        <option value="Profesor">Profesor</option>
                        <option value="Alumno">Alumno</option>
                    </select><br>
                    
                    <label for='nombre' >Enunciado:</label><br/>
                    <textarea type='textarea' name='enunciado' id='enunciado' maxlength="300">
                        
                    </textarea><br/>
               
                    
                    <label for='apellidos' >Opcion 1:</label><br/>
                        <input type='text' name='apellidos' id='apellidos' maxlength="50" /><br/>
                      
                        <input type="radio" name="favorite_pet" value="Correcta 1" checked>Correcta<br>

                    </label>
                    <label for='apellidos' >Opcion 2:
                        <input type='text' name='apellidos' id='apellidos' maxlength="50" /><br/>
                        <input type="radio" name="favorite_pet" value="Correcta 2" checked>Correcta<br>
                    </label><br/>
                   

                    <label for='apellidos' >Opcion 3:
                        <input type='text' name='apellidos' id='apellidos' maxlength="50" /><br/>
                        <input type="radio" name="favorite_pet" value="Correcta 3" checked>Correcta<br>
                    </label><br/>
                   

                    <label for='apellidos' >Opcion 4:

                        <input type="radio" name="favorite_pet" value="Correcta 4" checked>Correcta<br>
                    <input type='text' name='apellidos' id='apellidos' maxlength="50" /><br/>
                    </label><br/>

                    <input type='submit' name='enviar' value='Aceptar'/><br/>
             
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