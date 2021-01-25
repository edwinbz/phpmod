<?php
class App
{
    public static $url;

    public function load()
    {
        self::$url = $this->verificarUri(URI);
        $router = new Router();
        $view = $router->linkModel(self::$url);
        include $view;
    }

    private function verificarUri($uri)
    {
        if (APP_PRO) {
            $link = $url = $this->str_replace_first("/", "", $uri);
        } else {
            $link = $url = str_replace("/" . APP_ROOT, "", $uri);
        }
        $link = preg_replace('/(\/+)/', '/', $link); //remove duplicate slash
        if (strlen($link) > 0) { //if it has content
            if ($link[0] == "/") { //remove slash after domain
                $link = substr($link, 1);
            }
            if ((strpos($link, '?') === false) && (strpos($link, '.') === false)) {
                if (substr($link, -1) != "/") {
                    $link .= "/";
                }
            }
        }
        if ($link != $url) { //if it has changes redirect
            $dir = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" . APP_ROOT;
            header("location: " . $dir . $link);
        }
        $temporal = preg_split('@/@', $link, null, PREG_SPLIT_NO_EMPTY);
        foreach ($temporal as $key => $value) {
            if (strpos($value, '?') !== false) {
                unset($temporal[$key]);
            }
        }
        if (empty($temporal)) {
            $temporal = array(DEFAULT_VIEW);
        }
        return $temporal;
    }

    public function str_replace_first($from, $to, $content)
    {
        $from = '/' . preg_quote($from, '/') . '/';
        return preg_replace($from, $to, $content, 1);
    }

    public function isActive($routeName)
    {
        if (self::$url[0] == $routeName) {
            echo "active";
        }
    }
}