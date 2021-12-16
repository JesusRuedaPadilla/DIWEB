<?php

class Examenes {
    
    protected $id;
    protected $descripcion;
    protected $duracion;
    protected $num_preguntas;
    protected $activo;


    public function set($dni){
        $this-> $dni;
    
        
    
    }

    
    
    public function getid() {return $this->id; }
    public function getemail() {return $this->email; }
    public function getroles() {return $this->rol; }
    public function getpassword() {return $this->Password; }
    public function getname() {return $this->Nombre; }
    
    public function __construct($row) {
        $this->id = $row['id'];
        $this->roles = $row['rol'];
        $this->password= $row['password'];
        $this->name = $row['nombre'];
        
    }
}

?>