<?php
class Modules
{
    // Modules vars
    public static $routes; // Rutas
    public static $ajax; // Ajax

    // Functions
    public static function setRoute(string $folder, string $routeName, string $viewFile, bool $authRequired, array $roles = [], int $limitSlashes = 1)
    {
        self::$routes[$routeName] = array(
            'folder' => $folder,
            'viewFile' => $viewFile,
            'authRequired' => $authRequired,
            'roles' => $roles,
            'limitSlashes' => $limitSlashes
        );
    }

    public static function setAjax(string $moduleName, string $modelFile, string $modelName, string $controllerFile, string $controllerName, bool $authRequired, array $roles)
    {
        self::$ajax[$moduleName] = array(
            'modelFile' => $moduleName . '/' . $modelFile,
            'modelName' => $modelName,
            'controllerFile' => $moduleName . '/' . $controllerFile,
            'controllerName' => $controllerName,
            'authRequired' => $authRequired,
            'roles' => $roles,
        );
    }
    public static function returnBadRequest($msg)
    {
        if (APP_DEBUG) {
            echo $msg;
            http_response_code(400);
            exit;
        } else {
            http_response_code(400);
            exit;
        }
    }
}

