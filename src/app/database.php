<?php
class Conexion
{
    public static function conectar()
    {
        try {
            $con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $con->exec("SET CHARACTER set utf8mb4");
            $con->exec("SET NAMES utf8mb4");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                _response(false, $e->getMessage(), [], ERROR_PDO);
            } else {
                _response(false, "Error estableciendo conexión con la base de datos", [], ERROR_PDO);
            }
            die();
        }
    }
    public function consulta($sql, $params, $tipo)
    {
        $stm = Conexion::conectar()->prepare($sql);
        for ($i = 0; $i < count($params); $i++) {
            $stm->bindParam(($i + 1), $params[$i - 1]);
        }
    }
}