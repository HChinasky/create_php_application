<?php 

namespace Controllers\Admin;

use Models\Admin\Articles as Articles1;

use Core\Controller;

class Articles extends Controller{
	
	/**
	 * 
	 */
	public function index(){
		$articles = new Articles1();
		$articles = $articles->get_articles();
        $data = array(
            'articles' => $articles
        );
		$this->view->generate('', $data);
	}

    /**
     * @param array $args
     */
    function article(array $args = null){
        $id = (isset($args[0])? $args[0]: "");
        $model = new Articles1();
        $article = $model->getById($id);
        $data = array(
            'article' => $article,
        );
        $this->view->generate('',  $data);
    }
}


 ?>