<?php
class AutentificacionModel
{
    public $id;
    public $user;
    public $pass;
    public $token;
    //
    public $alias;
    public $nombres;
    public $apellidos;
    public $email;
    public $password;
    public $rol;

    public function loginAdmin()
    {
        // Define la consulta SQL
        $sql = "SELECT Usu_id, Usu_nombres, Usu_apellidos, Usu_rol, Usu_acceso, Usu_eliminado FROM `usuarios` WHERE (`Usu_alias` LIKE BINARY :user OR `Usu_email` LIKE :user)  AND `Usu_password` = :pass";
        // Define los paramentros para la consulta SQL
        $par = [':user' => $this->user, ':pass' => $this->pass];
        // Ejecuta y retorna la el resultado solicitado de la consulta
        return _query($sql, $par, RES_FETCH_NUM, OPE_READ);
    }

    public function checkUserActive()
    {
        $sql = "SELECT Usu_id, Usu_nombres, Usu_apellidos from usuarios WHERE Usu_email = ? AND Usu_acceso = 1 AND Usu_eliminado = 0";
        $par = [$this->user];
        return _query($sql, $par, RES_FETCH_NUM);
    }

    public function checkUser()
    {
        $sql = "SELECT Usu_id from usuarios WHERE Usu_email = ?";
        $par = [$this->email];
        return _query($sql, $par, RES_FETCH_NUM);
    }

    public function saveToken()
    {
        $sql = "UPDATE `usuarios` SET `Usu_token` = ? WHERE `usuarios`.`Usu_id` = ?";
        $par = [$this->token, $this->id];
        return _query($sql, $par, RES_ROW_COUNT);
    }

    public function checkToken()
    {
        $sql = "SELECT Usu_id FROM usuarios WHERE Usu_token = :token";
        $par = [':token' => $this->token];
        return _query($sql, $par, RES_FETCH_NUM);
    }

    public function updatePassword()
    {
        $sql = "UPDATE `usuarios` SET `Usu_password` = ? WHERE `usuarios`.`Usu_id` = ?";
        $par = [$this->pass, $this->id];
        $stm = Conexion::conectar()->prepare($sql);
        $stm->execute($par);
        return $stm->rowCount();
        //return _query($sql, $par, RES_ROW_COUNT);
    }
}
