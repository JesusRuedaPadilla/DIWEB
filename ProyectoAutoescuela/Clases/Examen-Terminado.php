<?php

class Examen_Terminado {
   
    protected $id;
    protected $id_examen;
    protected $id_usuarios;
    protected $fecha;
    protected $calificacion;
    protected $ejecucion;

    
    public function getidExamen() {return $this->id_examen; }
    public function getidUsuarios() {return $this->id_usuarios; }
    public function getFecha() {return $this->fecha; }
    public function getCalificacion() {return $this->calificacion; }
    public function getEjecucion() {return $this->ejecucion; }
    
    public function __construct($row) {
        $this->id_examen = $row['id_examen'];
        $this->ed_usuarios = $row['id_usuarios'];
        $this->fecha = $row['fecha_nac'];
        $this->calificacion= $row['calificacion'];
        $this->ejecucion = $row['ejecucion'];
        
    }

}
?>