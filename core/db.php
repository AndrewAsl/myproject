<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author aslezov
 */
class Db {
    //put your code here
    static $dbc;
    
    static function connect(){
        if (!self::$dbc){
            self::$dbc = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8", 'root', '');
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    
    static function insert($table_name, $cols, array $values){
        $keys_arr = array_keys($values);
        $str = implode(",", $keys_arr);
        $stmt = self::$dbc->prepare(
                "INSERT INTO".$table_name.$cols.
                "VALUES (".$str.")");
        if($stmt-> execute($values)){
            return true;
        } else{ 
            return false;
        }    
    }
}
