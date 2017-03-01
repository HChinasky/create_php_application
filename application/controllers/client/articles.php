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

    
    /**
     * @param array $args
     */
    function action_article(array $args = null){
        $id = (isset($args[0])? $args[0]: "");
        $model = new Model_Articles();
        $article = $model->getById($id);
        $data = array(
            'article' => $article,
            'breadcrumb' => 'Главная / Статьи / '.$article['title'],
        );
        $this->view->generate('',  $data);
    }
}