<?php
// Inicializa sesión en los servicios del conmutador
session_start();

require_once 'config.php';
require_once 'src/app/modules.php';

// Import modules
require_once 'modules.php';

// Import global functions
require_once 'src/app/functions.php';

// Verifica el host
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null;
if (!in_array($host, APP_HOSTS)) {
    Modules::returnBadRequest("La dirección de host ($host) no esta autorizada");
}
/*
// Verifica origin
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : null;
if (!in_array($origin, APP_ORIGINS)) {
    // Verifica APP_KEY
    /*$apiKey = isset($_POST['APP_KEY']) ? $_POST['APP_KEY'] : null;
    if ($apiKey !== APP_KEY) {
        Modules::returnBadRequest("Acceso denegado");
    }
}*/

// Recibe la solicitud
$path = isset($_POST['path']) ? htmlspecialchars($_POST['path']) : null; // módulo/función
$path = preg_split("@/@", $path, null, PREG_SPLIT_NO_EMPTY);

// Verifica solicitud
if ($path == null || count($path) != 2) {
    Modules::returnBadRequest("El path de la solicitud esta incorrecto");
}

$mod = $path[0]; // Módulo
$fun = $path[1]; // Función

// Verifica módulo
if (!isset(Modules::$ajax[$mod])) {
    Modules::returnBadRequest("No se encuentra el módulo ($mod)");
}

// Trae datos del módulo
$model = Modules::$ajax[$mod]['modelFile'];
$controller = Modules::$ajax[$mod]['controllerFile'];
$controllerName = Modules::$ajax[$mod]['controllerName'];
$authRequired = Modules::$ajax[$mod]['authRequired'];

/**
 * @var array
 */
$roles = Modules::$ajax[$mod]['roles'];

// Verifica auth
if ($authRequired == true && isset($_SESSION['user_id']) == false) {
    Modules::returnBadRequest("Se requiere autentificación para ejecutar funciones del módulo ($mod)");
}

// Verifica rol
if (count($roles) > 0) {
    $rol = isset($_SESSION['user_rol']) ? $_SESSION['user_rol'] : 0;
    if (!in_array($rol, $roles)) {
        Modules::returnBadRequest("No tiene permisos para acceder a este módulo ($mod)");
    }
}

// Trae archivos nesesarios para realizar la solicitud
require_once APP . 'database.php';
require_once MOD . $model;
require_once MOD . $controller;

// Llama la función
$object = new $controllerName();
if (is_callable(array($object, $fun))) {
    $object->$fun();
} else {
    Modules::returnBadRequest("No se puede ejecutar la función ($fun)");
}
