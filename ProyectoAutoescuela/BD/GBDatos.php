<?php
// require_once './Cargadores/cargarBD.php';
require_once ('Usuario.php');

class GBDatos{

        private static $conex;

        public static function IniciaConex(){
    
            try {
                self::$conex= new PDO('mysql:host=localhost;dbname=autoescuela', 'root', '');
                return true;
            } catch (\Throwable $th) {
                return false;
            }
               
               
        }

        public static function insertHashCorreo($hash,$correo){

            $sql="INSERT INTO usuarios hash like ? where correo like ?";
            $resultado = self::$conex->prepare($sql);
            $resultado->bindParam(1,$hash);
            $resultado->bindParam(2,$correo);
            $resultado->execute();
        }

        public static function insertHashContraseña($hash,$contrasena){

            $sql="INSERT INTO usuarios hash=? where contrasena=?";
            $resultado = self::$conex->prepare($sql);
            $resultado->bindParam(1,$hash);
            $resultado->bindParam(2,$contrasena);
            $resultado->execute();
        }

        public static function updatePass($hash,$pass){
            $sql="UPDATE usuarios SET contrasena=? where hash=?";
            $resultado = self::$conex->prepare($sql);
            $resultado->bindParam(1,$pass);
            $resultado->bindParam(2,$hash);
            $resultado->execute();
            return true;
        }

        public static function deleteHash($hash){

            $sql="UPDATE `usuarios` SET `hash`=NULL WHERE `hash` LIKE ?";
            $resultado = self::$conex->prepare($sql);
            $resultado->bindParam(1,$hash);
            $resultado->execute();
            
        }

        public static function existeusuario($correo,$contrasena)
        {
    
            $sql="SELECT * FROM usuarios WHERE correo like '$correo' and contrasena like '$contrasena'"; 
            $resultado = self::$conex->query($sql);
            $count = $resultado->rowCount();
            return $count==1;
                         
        }

        public static function existeCorreo($correo)
        {
    
            $sql="SELECT * FROM usuarios WHERE correo like '$correo'"; 
            $resultado = self::$conex->query($sql);
            $count = $resultado->rowCount();
            return $count==1;
                         
        }
    
        public static function obtieneUsuarios()
        {
            GBDatos::IniciaConex();
            $sql="SELECT correo, contrasena  FROM usuarios";
            $res= self::$conex->query($sql);
            $vector=array();
            while ($registro = $res->fetch(PDO::FETCH_ASSOC)) 
            {
                
                $u = new stdClass();
                $u->correo=$registro['correo'];
                $u->contrasena=$registro['contrasena'];
                array_push($vector,$u);
                
            }
            $JSON=json_encode($vector);
            return $JSON;
        
        }
        public static function existeTematicas($tema)
        {        
            $sql="SELECT `tema` FROM `tematica` WHERE `tema` like '$tema'"; 
            $resultado = self::$conex->query($sql);
            $count = $resultado->rowCount();
            return $count==1;
            
        }


        public static function InsertarUsuario($correo,$nombre,$apellidos,$fecha_nac,$contrasena,$Rol,$hash)
        {
            // echo "correo:".$correo."<br>"."nombre:".$nombre."<br>"."apellidos:".$apellidos."<br>"."fecha:".$fecha_nac;
            
            $sql="INSERT INTO `usuarios` VALUES (NULL,?,?,?,?,?,?, NULL,NULL,?)";
            $res= self::$conex->prepare($sql);
            if($correo!="" && $nombre!="" && $apellidos!=""){
                $res->bindParam(1,$correo);
                $res->bindParam(2,$nombre);
                $res->bindParam(3,$apellidos);
                $res->bindParam(4,$contrasena);
                $res->bindParam(5,$fecha_nac);
                $res->bindParam(6,$Rol);
                $res->bindParam(7,$hash);
                

           
              
                $res->execute();
            }        
        }

        
        public static function InsertarHASH($correo,$hash)
        {
            // echo "correo:".$correo."<br>"."nombre:".$nombre."<br>"."apellidos:".$apellidos."<br>"."fecha:".$fecha_nac;
            
            $sql="UPDATE `usuarios` SET `hash`=? WHERE `correo` LIKE ?";
            $res= self::$conex->prepare($sql);
        
                $res->bindParam(1,$hash);
                $res->bindParam(2,$correo);
                       
          
              
                $res->execute();
                    
        }


        public static function InsertarTematica($tema)
        {            
            $sql="INSERT INTO `tematica` VALUES (NULL,?)";
            $res= self::$conex->prepare($sql);
            if($tema!=""){
                $res->bindParam(1,$tema);
            
                $res->execute();
            }
        }

        public static function InsertarPregunta($enunciado,$imagen)
        {
            // echo "correo:".$correo."<br>"."nombre:".$nombre."<br>"."apellidos:".$apellidos."<br>"."fecha:".$fecha_nac;
            
            $sql="INSERT INTO `pregunta` VALUES (NULL,?,?,?,?,?,?, NULL,?)";
            $res= self::$conex->prepare($sql);
            if($correo!="" && $nombre!="" && $apellidos!=""){
                $res->bindParam(1,$correo);
                $res->bindParam(2,$nombre);
                $res->bindParam(3,$apellidos);
                $res->bindParam(4,$contrasena);          
              
                $res->execute();
            }        
        }

        public static function obtieneProductosPaginados(int $pagina, int $filas):array
    {
        $registros = array();
        $res = self::$con->query("select * from tech.productos");
        $registros =$res->fetchAll();
        $total = count($registros);
        $paginas = ceil($total /$filas);
        $registros = array();
        if ($pagina <= $paginas)
        {
            $inicio = ($pagina-1) * $filas;
            $res= self::$con->query("select * from tech.productos limit $inicio, $filas");
            $registros = $res->fetchAll(PDO::FETCH_ASSOC);
        }
        return $registros;
    }
    
}

?>