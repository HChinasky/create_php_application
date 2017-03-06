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
     * 
     */
    public function wrap_images(&$item, $key){
        $item = "<img src='images/$item' alt='' class='preview'>";
    }
    
    /**
     * @param array $args
     */
    function article(array $args = null){
        $id = (isset($args[0])? $args[0]: "");
        $model = new Articles1();
        $article = $model->getById($id);
         // строку преобразуем в массив и оборачиваем тегами
        if(!empty($article['image'])){
            $arr = explode(',' , $article['image']);
            array_walk($arr, [$this , 'wrap_images']);
            $article['image'] = implode('' ,$arr);
        }
        $data = array(
            'article' => $article,
            'breadcrumb' => 'Главная / Статьи / '.$article['title'],
        );
        $this->view->generate('',  $data);
    }
}