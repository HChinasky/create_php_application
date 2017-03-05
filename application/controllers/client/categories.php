<?php 

namespace Controllers\Client;

use Core\Controller;
use Models\Client\Categories as Categories1;

class Categories extends Controller
{
    /**
     * 
     */
    public function index(){
        $categories = new categories1();
        $categories = $categories->get_categories();
        $data = array(
            'categories' => $categories
        );
        $this->view->generate('categories', $data);
    }

    /**
     * 
     */

    public function category(array $args = null){
        $id = (isset($args[0])? $args[0]: "");
        $categories = new categories1();
        $categories = $categories->get_category($id);
        $data = array(
            'categories' => $categories
        );
        $this->view->generate('', $data);
    }
}