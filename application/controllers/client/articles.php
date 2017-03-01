<?php 

namespace Client;

use Core\Controller;

class Controller_Articles extends Controller
{
    /**
     *
     */
    function action_index()
    {
        $model = new Model_Articles();
        $articles = $model->get_articles();
        $data = array(
            'breadcrumb' => 'Главная',
            'articles' => $articles
        );
        $this->view->generate('main',  $data);
    }
}