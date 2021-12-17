<?php
    include_once "BD/GBDatos.php";
    require_once "mail.php"; 

    if(GBDatos::IniciaConex()){

    if(isset($_POST['correo'])){

        $correo=$_POST['correo'];

        if(isset($_POST['Enviar'])){

            if(GBDatos::existeCorreo($correo)){
                $hash=md5($correo);


                GBDatos::InsertarHASH($correo,$hash);
          
                mandaEmail($correo,"Cambiar contraseña","<a href='http://localhost/Proyectos/ProyectoAutoescuela/Principal/cambioContrase%c3%b1a.php?id=$hash'>Pulsa para cambiar contraseña</a>");    
    

        }
        else{
            echo "El correo que ha escrito no esta registrado en nuestra pagina.";
        }
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambia contraseña</title>
    <link rel="stylesheet" href="../css/cambiarContraseña.css">
    <script src="../JSON/ajax.js"></script>
</head>
<body>
    <form action="" method="post">
        <p>Indique su correo electronico</p>
        <input type="text" name="correo" id="correo">
        <input type="submit" name="Enviar" value="Enviar">
    </form>

</body>
</html>
