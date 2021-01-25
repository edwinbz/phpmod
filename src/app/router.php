
<?php
class Router
{
    private $modules;
    public function __construct()
    {
        $this->modules = new Modules();
    }

    public function linkModel($uri)
    {
        $auth = isset($_SESSION['user_id']) ? true : false;
        $role = isset($_SESSION['user_rol']) ? $_SESSION['user_rol'] : null;
        $root = $uri[0];
        $route = isset($this->modules::$routes[$root]) ? $this->modules::$routes[$root] : null;
        if (isset($route) || $uri[0] == "logout") {
            // Check logout request
            if ($uri[0] == "logout") {
                session_destroy();
                header("location: " . HOST);
                exit;
            }
            // Check limit
            if (count($uri) != $route['limitSlashes']) {
                return 'src/errors/404.php';
            }
            // Check auth
            if ($auth) {
                if ($uri[0] == "login") {
                    header('location: ' . HOST);
                }
            } else {
                if ($route['authRequired'] == true) {
                    header('location: ' . HOST . 'login/');
                }
            }
            // Check role
            if ($role != null && $route['authRequired'] == true) {
                if (!in_array($role, $route['roles'])) {
                    return 'src/errors/403.php';
                }
            }
            return MOD . $route['folder'] . "/" . $route['viewFile'];
        } else {
            App::$url[1] = $uri[0];
            return 'src/errors/404.php';
        }
    }
}