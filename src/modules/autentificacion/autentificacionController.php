<?php
class AutentificacionController
{
    public function login()
    {
        // Trae el plugin de encritación
        require_once PLU . 'encrypt.php';
        $encrypt = new EncryptPlugin();

        // Delay (Keyboard closing time on mobile)
        usleep(500000);

        // Instancia el modelo
        $login = new AutentificacionModel();

        // Asigna los valores POST despues de validarlos con la funcion global _val()
        $login->user = _val('user');
        $login->pass = $encrypt->encryptPass(_val('pass'));

        // Llama la funcion del modelo
        $cs = $login->loginAdmin();

        // Procesa la respuesta del modelo
        if (!empty($cs)) {
            $cs = $cs[0];
            // Valida si el usuario tiene acceso
            if ($cs[4] == 0 || $cs[5] == 1) {
                _response(false, 'El usuario no está autorizado para acceder al sistema');
            }
            // Almacena el resultado de la consulta en variables de sesión
            $_SESSION['user_id'] = $cs[0];
            $_SESSION['user_rol'] = $cs[3];
            $_SESSION['user_name'] = array(
                0 => $cs[1],
                1 => $cs[2],
                2 => count(explode(" ", $cs[1])) > 0 ? explode(" ", $cs[1])[0] : '',
                3 => count(explode(" ", $cs[2])) > 0 ? explode(" ", $cs[2])[0] : '',
            );
            $open = '';
            switch ($cs[3]) {
                case '1':
                    $open = 'dashboard/';
                    break;
                default:
                    break;
            }
            // Responde a la peticion AJAX
            _response(true, '', $open);
        } else {
            // Responde a la peticion AJAX
            _response(false, 'El usuario, correo electrónico o contraseña son incorrectos');
        }
    }

    public function recover()
    {
        require_once PLU . 'mail.php';
        $auth = new AutentificacionModel();
        $mail = new MailPlugin();

        // Delay (Keyboard closing time on mobile)
        usleep(500000);

        $auth->user = _val('user');
        $cs = $auth->checkUserActive();

        if (!empty($cs)) {
            $date = new DateTime();
            $auth->id = $cs[0][0];
            $auth->token = md5($date->getTimestamp());
            $auth->saveToken();

            // Correo electrónico
            $mail->asunto = APP_NAME . " - Recuperar contraseña";
            $mail->destinatario = $auth->user;
            $mail->nombre = $cs[0][1] . " " . $cs[0][2];
            $mail->mensaje = "Por favor accede al siguiente enlace para recuperar tu contraseña de "
            . APP_NAME . " " . HOST . "recover/?token=" . $auth->token;

            $send = $mail->sendPHPMailer();
            if ($send === true) {
                _response(true, 'ok');
            } else {
                $auth->token = null;
                $auth->saveToken();
                $msg = 'Se ha producido un error enviando las instrucciones a la dirección de correo electrónico. Por favor inténtelo más tarde o comuníquese con el soporte técnico.';
                _response(false, $msg);
            }

        } else {
            _response(false, 'El usuario no existe o se encuentra deshabilitado.');
        }
    }

    public function checkToken($token)
    {
        $auth = new AutentificacionModel();
        $auth->token = $token;
        $cs = $auth->checkToken();

        if (!empty($cs)) {
            return $cs[0][0];
        } else {
            return false;
        }
    }

    public function reasign()
    {
        // Trae el plugin de encritación
        require_once PLU . 'encrypt.php';
        $encrypt = new EncryptPlugin();
        $auth = new AutentificacionModel();
        $auth->token = _val('token');
        $auth->pass = $encrypt->encryptPass(_val('pass'));

        // Verifica si existe el token
        $id = AutentificacionController::checkToken($auth->token);
        if ($id != false) {
            // Actualiza contraseña
            $auth->id = $id;
            $cs = $auth->updatePassword();
            if ($cs > 0) {
                $auth->token = null;
                $auth->saveToken();
                _response(true);
            } else {
                _response(false, 'Se ha producido un error actualizando la contraseña del usuario.');
            }
        } else {
            _response(false, ' El enlace no es válido o ya ha caducado.');
        }
    }
}
