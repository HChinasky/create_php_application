<?php 

namespace Controllers\Admin;

use Models\Admin\Articles as Articles1;
use Models\Admin\Categories;

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
     * 
     */
    public function wrap_images(&$item, $key){
        $item = "<img src='images/$item' alt='' class='preview'>";
    }

    /**
     * 
     */
    public function delete_images($item){
        if(file_exists(PATH_SITE.DS.'images'.DS.$item)){
            unlink(PATH_SITE.DS.'images'.DS.$item);
        }
    }

    /**
     * 
     */
    public function categories_select(&$item, $key){
        $item = "<option value='{$item['id']}'>{$item['name']}</option>";
    }

    /**
     * @param array $args
     */
    public function article(array $args = null){
        $id = (isset($args[0])? $args[0]: "");
        $model = new Articles1();
        $categories_mod = new Categories();

        // edit action
        if(!empty($_POST)){
            /* base values */
            $data = [];
            foreach ($_POST as $key => $value) {
                global $data;
                if(!empty($value) && $key != 'category'){
                    $data[$key] = $value;
                }
            }
            /* image  */
            if(!empty($_FILES['image']['name'][0])){
                $data["preview_pic"] = $_FILES['image']['name'][0];
                $uploaded_files = [];
                foreach($_FILES['image']['error'] as $key=> $error){
                    global $uploaded_files;
                    if($error == UPLOAD_ERR_OK){
                        $tmp_name = $_FILES['image']['tmp_name'][$key];
                        $name = basename($_FILES['image']['name'][$key]);
                        $res = move_uploaded_file($tmp_name, PATH_SITE.DS.'images'.DS.$name); 
                        if($res){
                            $uploaded_files[] = $_FILES['image']['name'][$key];
                        }
                    }
                }
                // массив картинок переводим в строку
                $data["image"] = implode(',' , $uploaded_files);
            }
            // категории
            $category = [];
            if(!empty($_POST['category'])){
                foreach ($_POST['category'] as $key => $value) {
                    global $category;
                    $category[$key]['article_id'] = $id; 
                    $category[$key]['category_id'] = $value; 
                }
            }

            $model->edit($data, $category);
        }


        $article = $model->getById($id);
        $categories = $categories_mod->get_categories();

        // строку преобразуем в массив и оборачиваем тегами
        if(!empty($article['image'])){
            $arr = explode(',' , $article['image']);
            array_walk($arr, [$this , 'wrap_images']);
            $article['image'] = implode('' ,$arr);
        }

        // категории преобразуем в селект
        if(!empty($categories)){
            array_walk($categories, [$this, 'categories_select']);
            $cats = "<select name='category[]' multiple='multiple' class='form-control'>";
            $cats .= implode('', $categories);
            $cats .= "</select>";
        }

        $data = array(
            'article' => $article,
            'categories' => $cats,
        );
        $this->view->generate('',  $data);
    }

    /**
     * 
     */
    public function add(){
         $model = new Articles1();
         $categories_mod = new Categories();

        if(!empty($_POST)){

            /* base values */
            $data = [];
            foreach ($_POST as $key => $value) {
                global $data;
                if(!empty($value && $key != 'category')){
                    $data[$key] = $value;
                }
            }
            /* image  */
            if(!empty($_FILES['image']['name'][0])){
                $data["preview_pic"] = $_FILES['image']['name'][0];
                $uploaded_files = [];
                foreach($_FILES['image']['error'] as $key=> $error){
                    global $uploaded_files;
                    if($error == UPLOAD_ERR_OK){
                        $tmp_name = $_FILES['image']['tmp_name'][$key];
                        $name = basename($_FILES['image']['name'][$key]);
                        $res = move_uploaded_file($tmp_name, PATH_SITE.DS.'images'.DS.$name); 
                        if($res){
                            $uploaded_files[] = $_FILES['image']['name'][$key];
                        }
                    }
                }
                // массив картинок переводим в строку
                $data["image"] = implode(',' , $uploaded_files);
            }
                        // категории
            $category = [];
            if(!empty($_POST['category'])){
                foreach ($_POST['category'] as $key => $value) {
                    global $category;
                    $category[$key]['category_id'] = $value; 
                }
            }

            $res = $model->add($data, $category);
        }

        $categories = $categories_mod->get_categories();

        if(!empty($categories)){
            array_walk($categories, [$this, 'categories_select']);
            $cats = "<select name='category[]' multiple='multiple' class='form-control'>";
            $cats .= implode('', $categories);
            $cats .= "</select>";
        }

        $data = array('categories' => $cats);
        $this->view->generate('addArticle',  $data);   
    }

    /**
     * 
     */
    public function delete($args = null){
       $id = (isset($args[0])? $args[0]: ""); 
       if($id){
            $model = new Articles1();
            $article = $model->getById($id);
           $res = $model->delete($id);
            // удаляем картинки
            if($res == true){
                $arr = explode(',' , $article['image']);
                array_walk($arr, [$this, 'delete_images']);
            }
       }
       $this->view->redirect('/admin');
    }
}


 ?>