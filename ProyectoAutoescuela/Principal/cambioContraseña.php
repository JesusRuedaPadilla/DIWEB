<?php
    include_once "../BD/GBDatos.php";
    if(isset($_GET['id'])){

        if(isset($_POST['Enviar'])){

            if($_POST['pass1']==$_POST['pass2']){
    
                if(GBDatos::IniciaConex()){

                    GBDatos::updatePass($_GET['id'],$_POST['pass1']);
    
                        if(GBDatos::deleteHash($_GET['id'])==true){
                            echo "Contraseña cambiada correctamente";                            
                        }
                        header("Location:../Inicio.php");
                }

            }else{

                echo "<script>alert('Las contraseñas no coinciden')</script>";
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
        <p>Contraseña</p>
        <input type="password" name="pass1" id="pass1">
        <p>Repetir Contraseña</p>
        <input type="password" name="pass2" id="pass2"><br>
        <input type="submit" name="Enviar" value="Enviar">
        
    </form>

</body>
</html>
