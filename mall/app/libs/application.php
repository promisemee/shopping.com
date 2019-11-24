<?php

namespace app\libs;

class Application {

    public $controller;
    public $action;

    public function __construct(){

        $getUrl = '';
        if (isset($_GET['url'])) {
            $getUrl = rtrim($_GET['url'], '/');
            $getUrl = filter_var($getUrl, FILTER_SANITIZE_URL);
        }

        $getParams = explode('/', $getUrl);

        $params['menu']     = isset($getParams[0]) && $getParams[0] != '' ? $getParams[0] : 'Main_';
        $params['action']   = isset($getParams[1]) && $getParams[1] != '' ? $getParams[1] : 'index';
        $params['category'] = isset($getParams[2]) && $getParams[2] != '' ? $getParams[2] : null;
        $params['idx']      = isset($getParams[3]) && $getParams[3] != '' ? $getParams[3] : null;
        $params['pageNum']  = isset($getParams[4]) && $getParams[4] != '' ? $getParams[4] : null;

        if (!file_exists('app/controllers/'. $params['menu'] .'Controller.php')) {
            echo 'app/controllers/'. $params['menu'] .'Controller.php'  ;
            echo "There is no such Controller.";
            exit();

        }

        $controllerName = '\application\controllers\\'.$params['menu'].'controller';
        new $controllerName($params['menu'], $params['action'], $params['category'], $params['idx'], $params['pageNum']);

    }

}
