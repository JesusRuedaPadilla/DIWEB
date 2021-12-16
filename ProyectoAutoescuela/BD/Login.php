<?php
// require_once './Cargadores/cargarBD.php';
require_once "Usuario.php";
require_once "Sesion.php";
require_once "GBDatos.php";
class Login
{
    public static function Identifica($correo,$contrasena)
    {
        if(self::Existeusuario($correo,$contrasena))
        {
            Sesion::IniciaConex();
            Sesion::escribir('login',$correo); 
        
            return true;
        }
        return false;
    }

    private static function ExisteUsuario($correo,$contrasena)
    {
        GBDatos::IniciaConex();
        if(GBDatos::existeusuario($correo,$contrasena)){

            echo "<h1>Es usuario</h1>";
        }else{

            echo "<h1>No usuario</h1>";
        }
    }

    public static function UsuarioEstaLogueado()
    {
        if($_COOKIE['correo'] && $_COOKIE['contrasena'] )
        {
            Sesion::init();
            Sesion::escribir('correo',$_COOKIE['correo']);
            Sesion::escribir('contrasena',$_COOKIE['contrasena']);

            return true;
        }
        else
        {
            Sesion::leer('login');
            return true;
        }
        
        return false;
    }
  
}