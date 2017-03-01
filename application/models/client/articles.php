<?php 

namespace Client;

use Core\Model;
use Lib\Lib_Registry;
use Lib\Lib_DateBase;


class Model_Articles extends Model
{
    /**
     * @param $id
     * @return mixed
     */
    public function getById($id){
        $sql = 'SELECT * FROM article WHERE id = %s';
        $result = Lib_DateBase::query($sql, $id);
        $row = $result->fetch_assoc();
        return $row;
    }
    
    /**
     * 
     */
    public function get_articles(){
                
        $sql = 'SELECT * FROM article';

        $result = Lib_DateBase::query($sql);
        $row2 = array();
        while ($row = $result->fetch_assoc()) {
            array_push($row2 , $row);
        }
        if(empty($row2))return;
        return $row2;
    }
}