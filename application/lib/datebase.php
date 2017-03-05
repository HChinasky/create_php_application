<?php

namespace Lib;

class DateBase {

    /**
     * @param $query
     * @return mixed
     */
	function query($query)
	{
		// получаем объект mysqli
		$mysqli = Registry::get('mysqli');
		// если запрос с параметрами
		if(($num_args = func_num_args()) > 1){
			$arg  = func_get_args();
			unset($arg[0]);
			// пробегаемся по параметрам для экранирования кавчек
			foreach($arg as $argument=>$value){
				$arg[$argument]= $mysqli->real_escape_string($value);
			}
			// форматирование запроса
			$query = vsprintf($query,$arg);	
		}
		// выполняем запрос
        $sql = Registry::get('mysqli')->query($query);
        if(preg_match('`^(INSERT|UPDATE|DELETE|REPLACE)`i',$query,$null)){
			if($sql = $mysqli->affected_rows){
				return $sql;
			}		
		}else{
			if(!$sql)return;
			if($sql->num_rows){
				return $sql;
			}
		}
		return $sql;	
	}

    /**
     * @param $query
     * @param $array
     * @param string $where
     * @param string $_devide
     * @return bool|mixed
     */
	function build_query($query,$array,$where = '', $_devide = ',')
	{
		if(is_array($array)){
			$part_query = '';
			$mysqli = Registry::get('mysqli');
			foreach($array as $index=>$value){
				$part_query .= sprintf(" %s = '%s'".$_devide,$index,$mysqli->real_escape_string($value));
			}
			$part_query = trim($part_query,$_devide);
			$query.=$part_query." ".$where;
			return $this->query($query);
		}
		return false;
	}

    /**
     * @param $object
     * @return mixed
     */
	function fetch_object($object)
	{
		return $object->fetch_object();
	}

    /**
     * @param $object
     * @return mixed
     */
	function num_rows($object)
	{
		return $object->num_rows;
	}

    /**
     * @param $object
     * @return mixed
     */
	function affected_rows($object)
	{
		return $object->affected_rows;
	}

    /**
     * @return mixed
     */
	function insert_id()
	{
		return Registry::get('mysqli')->insert_id;
	}
}