<?php

namespace Core;

class View
{
    private $view_path_folder;
    private $class;

    /**
     * @param $controller_path_folder
     */
    public function __construct($controller_path_folder){
    // путь вида application/controllers/client заменяется на  application/views/client
        $this->view_path_folder = str_replace("controller", "view", $controller_path_folder);
    }

    /**
     * @param $content_view
     * @param null $data
     */
    function generate($content_view, $data = null)
    {
        
        if(is_array($data)) {
            extract($data);
        }

        /* ************** базовый шаблон */
        $template_view = 'template.php';

        if($content_view == null || $content_view == ''){
            /* ************ caller для дефолтной вьюхи если не задана */
            $trace = debug_backtrace();
            $caller = $trace[1]['function'];
            $template = str_replace("action_", "", $caller);
            $content_view = strtolower($template).".php";
        }else{
            // вьюха для контента
            $content_view = $content_view.".php";
        }

            $templ = $this->view_path_folder."/".$template_view;
            if(is_file($templ))
        	    include($templ);
            else
                die("template_view $templ not found!!");
    }

}