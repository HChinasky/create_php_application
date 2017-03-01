<?php

namespace Core;

class Route
{
    private $path = "application/controllers/";
    private $controller_path_folder;
    private $namespace = "client";
    /**
     * @return bool
     */
    private function getIsAjaxRequest(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }



    /**
     * 
     */
    public function start()
    {
        // catch AJAX request
        if ($this->getIsAjaxRequest()) {
            
        }
        session_start();
        $this->dispatch();
     }

    /**
     * @param $file
     * @param $controller
     * @param $action
     * @param $args
     */
    private function getDirections(&$file, &$controller, &$action, &$args) {

        $route = (empty($_SERVER['REQUEST_URI'])) ? '' : $_SERVER['REQUEST_URI'];
        unset($_SERVER['REQUEST_URI']);
        $route = trim($route, '/\\');
        $controller_path = $this->path;
        if (empty($route)) {
        /* ******************* Default directions ******** */
            $controller = 'articles';
            $action = 'action_index';
            $controller_path = $this->controller_path_folder =  "application/controllers/$this->namespace/";
            $file = $controller_path.$controller.".php";
        }
        else
        {
            $parts = explode('/', $route);
            /* ************** namespace ********** */
            if($parts[0] == "admin") {
                $this->namespace =  "admin";
                array_shift($parts);
            }
            /* ***************** folders & subfolders ******* */
            $fullpath = $this->controller_path_folder = $controller_path . $this->namespace;
            foreach ($parts as $part) {
                $fullpath .= DS . $part;
                if (is_dir($fullpath)) {
                    array_shift($parts);
                    continue;
                }
                if (is_file($fullpath . '.php')) {
                    array_shift($parts);
                    $file = "$fullpath.php";
                    break;
                }
            }
            /* *************** Controller, Action, Params ******** */
            if(!isset($part))
                $part = "articles";
            $controller = $part;
            if(!$file)
                $file = $fullpath."/$part.php";
            $action = array_shift($parts);
            if(!$action)
                $action = 'action_index';
            else
                $action = "action_$action";
            $args = $parts;
        }
    }

    /**
     *
     */
    public function dispatch(){
        // диспетчер получает файл совпадающий с названием контроллера, экшн и аргументы 
        $this->getDirections($file, $controller, $action, $args);
        /* ************* include Controller - Model  */
        if (is_readable($file) == false) {
            die ("File $file 404 Not Found");
        }
        // подключили контроллер
        include ($file);
        $model = str_replace("controller", "model", $file);
        // Model additional 
        if(is_readable($model)){
            // подключаем модель
            include($model);
        } 
        /* ****** получаем класс ** */
        $controller = ucfirst($controller);
        $class = ucfirst($this->namespace).'\Controller_' . $controller;
        // создаем экземпляр
        $controller = new $class($this->controller_path_folder);
        if (is_callable(array($controller, $action)) == false) {
            die ("Action $action 404 Not Found");
        }
        // вызываем экшн
        $controller->$action($args);
    }

    /**
     *
     */
    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}