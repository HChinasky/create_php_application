<?php

use Lib\Lib_Registry;

 define('PATH_SITE', $_SERVER['DOCUMENT_ROOT']);
 define('HOST', 'localhost');
 define('USER', 'root');
 define('PASSWORD', 'vfneh44');
 define('NAME_BD', 'articles');
 define ('DS', DIRECTORY_SEPARATOR);
 $mysqli = new mysqli(HOST, USER, PASSWORD,NAME_BD)or die("Невозможно установить соединение c базой данных".$mysqli->connect_errno());
 Lib_Registry::set('mysqli',$mysqli);
 $mysqli->query('SET names "utf8"');   //база устанавливаем кодировку данных в базе



?>