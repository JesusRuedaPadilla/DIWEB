<?php   
use PHPMailer\PHPMailer\PHPMailer;

function mandaEmail($destino,$asunto,$mensaje) {

    require "./vendor/autoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 0;                          
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";                 
    $mail->Host       = "smtp.gmail.com";    
    $mail->Port       = 465;                 
    // introducir usuario de google
    $mail->Username   = "jesus@gmail.com"; 
    // introducir clave
    $mail->Password   = "";       
    $mail->SetFrom('jesus@gmail.com', 'Autoescuela');
    // asunto
    $mail->Subject    = $asunto;
    // cuerpo
    // $mail->addEmbeddedImage("./imagenes/imagen que quieres subir.jpg","foto");
    $mail->MsgHTML($mensaje);//<img src="cid:foto">
    // adjuntos
    //$mail->addAttachment("archivo que vamos a adjuntar junto con su extension (ej: hola.txt)");
   
    // destinatarios
    $mail->AddAddress($destino, "Test");
    // enviar
    $resul = $mail->Send();
    if(!$resul) {
      echo "Error" . $mail->ErrorInfo;
     }
     // else {
    //   echo '<section>"Enviado"</section>';
    // }

  }
?>