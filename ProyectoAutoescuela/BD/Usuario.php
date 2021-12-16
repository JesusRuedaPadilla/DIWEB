<?php

class Usuario {
    protected $id;
    protected $correo;
    protected $nombre;
    protected $apellidos;
    protected $contrasena;
    protected $fecha_nac;
    protected $rol;
    protected $foto;
    protected $activo;

     
    
    public function getid() {return $this->id; }
    public function getemail() {return $this->correo; }
    public function getname() {return $this->nombre; }
    public function getApellidos() {return $this->apellidos; }
    public function getpassword() {return $this->contrasena; }
    public function getfecha_nac() {return $this->fecha_nac; }
    public function getroles() {return $this->rol; }
    public function getimagen() {return $this->foto; }
    public function getactivo() {return $this->activo; }
    
    
    
    public function __construct($row) {
        $this->id = $row['id'];
        $this->correo = $row['correo'];
        $this->nombre = $row['nombre'];
        $this->apellidos = $row['apellidos'];
        $this->contrasena = $row['contrasena'];
        $this->fecha_nac = $row['fecha_nac'];
        $this->rol = $row['Rol'];
        $this->foto= $row['foto'];
        $this->activo = $row['activo'];
        
    }

    public static function contraseñaAleatoria(){
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@.¿}{)(/%?^*#$-+!¡";
        $contrasena = "";
        //Reconstruimos la contraseña segun la longitud que se quiera
        for($i=0;$i<=9;$i++) {
           //obtenemos un caracter aleatorio escogido de la cadena de caracteres
           $contrasena .= substr($str,rand(0,80),1);
        }
         //Mostramos la contraseña generada
        // echo 'Password generado: '.$contrasena;
        return $contrasena;
    }
}

?>