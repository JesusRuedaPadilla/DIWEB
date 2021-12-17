<?php
// require_once "Cargadores/cargarBD.php";
require_once "./BD/Usuario.php";
require_once "./BD/Login.php";
require_once "./BD/Sesion.php";
require_once "./BD/GBDatos.php";


//var_dump ($_COOKIE);

// if(isset($_POST['recuerdame']) || $_COOKIE){
//     Login::UsuarioEstaLogueado();
// }

    //Comprobamos si ya se ha enviado el formulario
    
        $error="";
    if (isset($_POST['enviar']))
    {
        
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
      
            if(GBDatos::IniciaConex()){

                if(GBDatos::existeusuario($correo,$contrasena)){
                    // echo "USUARIO LOGUEADO"."<br>";
                Sesion::init();
                $cookie_user = $correo;
                $cookie_cont = $contrasena;
                //  setcookie($cookie_user,  $cookie_cont, time() - 3600);

                setcookie('correo', $correo, time() + (120), "/"); // 86400 = 1 day
                setcookie('contrasena', $cookie_cont, time() + (120), "/");
                //setcookie($cookie_user, $cookie_cont, time() + (86400 * 30), "/"); // 86400 = 1 day

                
                header("Location:./Principal/paginaUsuario.php");

                }
                else{
                    echo "Usuario o contraseña incorrectos.<br> Compruebe los datos e intentelo de nuevo.";
                }
                
            }
           
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
  <title>Login Tienda Web</title>
  <link rel="stylesheet" href="./css/estilos.css">
  </head>

<body>
    
    <form action='Inicio.php' method='post'>
       
        
            <?php echo $error; ?>
      
            <img src="imagenes/autoescuela.jpg">
        

        <br/>
            <label for='correo' >Email:</label><br/>
            <input type='text' name='correo' id='correo' maxlength="50" /><br/>
       
            <label for='contrasena' >Contraseña:</label><br/>
            <input type='password' name='contrasena' id='contrasena' maxlength="50" /><br/>
        
            <input type="checkbox" name="recuerdame" value="recuerdame"> Recuerdame
      
           <a href="olvidaContraseña.php">¿Has olvidado tu contraseña?</a><br/>
     
    
              
            <input type='submit' name='enviar' value='Aceptar' />
        

    </form>
   
</body>
</html>