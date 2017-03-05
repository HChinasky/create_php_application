<?php 

namespace Controllers\Client;

use Core\Controller;
use Models\Client\Articles as Articles1;

class Articles extends Controller
{
    /**
     *
     */
    function index()
    {
        $model = new Articles1();
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
    function article(array $args = null){
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