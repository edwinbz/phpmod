<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

class MailPlugin
{
    public $asunto;
    public $destinatario;
    public $nombre;
    public $mensaje;
    
    function sendPHPMailer()
    { 
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        /*$mail->isSMTP(); 
        $mail->SMTPDebug = 1; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = SMTP_HOST; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = SMTP_PORT; // TLS only
        $mail->SMTPSecure = 'ssl'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;*/
        $mail->Sender = SMTP_FROM;
        $mail->setFrom(SMTP_FROM, SMTP_ALIAS);
        $mail->addAddress($this->destinatario, $this->nombre);
        $mail->addReplyTo(SMTP_FROM, SMTP_ALIAS);
        $mail->isHTML(true);
        $mail->Subject = $this->asunto;
        $mail->msgHTML($this->mensaje); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported';
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

        if(!$mail->send()){
            return $mail->ErrorInfo;
        }else{
            return true;
        }
    }

    function sendMail()
    {

    }
}
