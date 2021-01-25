<?php
// Inicializa sesión en toda la aplicación web
session_start();

// Se importa la configuración
require_once 'config.php';

// Se importa el AppCore
require_once APP . "main.php";
require_once APP . "modules.php";

// Se importan los modulos del sistema
require_once 'modules.php';

// Se importa el controlador de rutas y la funciones globales
require_once APP . "router.php";
require_once APP . "functions.php";

// Inicializa la aplicación
$app = new App();
$app->load();
