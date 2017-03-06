<?php 


namespace Models\Admin;

use Core\Model;
use Lib\Registry;
use Lib\DateBase;

class Categories extends Model{

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id){
        $sql = 'SELECT * FROM category WHERE id = %s';
        $result = DateBase::query($sql, $id);
        $row = $result->fetch_assoc();
        return $row;
    }
    /**
     * 
     */
    public function get_categories(){
                
        $sql = 'SELECT * FROM category';

        $result = DateBase::query($sql);
        $row2 = array();
        while ($row = $result->fetch_assoc()) {
            array_push($row2 , $row);
        }
        if(empty($row2))return;
        return $row2;
    }

    /**
     * 
     */
    public function edit($data = null){
        if(!empty($data)){
            $sql_articles = 'UPDATE category SET';
            $where = 'WHERE id='.$data['id'];
            $result = DateBase::build_query($sql_articles, $data, $where);
            return $result;
        }
    }

    /**
     * 
     */
    public function add($data = null){
        if(!empty($data)){
            $sql_articles = 'INSERT INTO category SET';
            $result = DateBase::build_query($sql_articles, $data);
            return $result;
        }
    }

    /**
     * 
     */
    public function delete($id = null){
        if(!empty($id)){
            $sql = 'DELETE FROM category WHERE id = %s';
            $result = DateBase::query($sql, $id);
            return $result;
        }
    }
}

 ?>