<?php
class FilePlugin
{
    public function uploadFile($file, $ruta)
    {
        $origen = $file['tmp_name'];
        $file_ext = substr($file["name"], strripos($file["name"], '.'));
        $name = substr($file["name"], 0, strrpos($file["name"], "."));
        $fecha = new DateTime();
        $new_name = $name . "-" . $fecha->getTimestamp();
        $destino = $ruta . $new_name . $file_ext;

        if (move_uploaded_file($origen, $destino)) {
            return $destino;
        } else {
            return false;
        }
    }

    public function deleteFile($file, $ruta)
    {
        if (file_exists($file)) {
            return unlink($file);
        }
    }
}
