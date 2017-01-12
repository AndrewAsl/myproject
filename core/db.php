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
    
    static function insert($table_name, array $values){
        $cols = array_keys($values);
        $str = implode(", ", $cols);
        $pattern = '/(^|[,]\s+)([a-zA-z])/iuU';
        $replace = '$1:$2';
        $newvalues = preg_replace ($pattern , $replace , $str);
        foreach ($values as $k=>$val){
            $k = preg_replace('/\b[a-zA-Z_-]+\b/', ':$0', $k);
            $newval[$k] = $val;
        }
        $stmt =self::$dbc->prepare("INSERT INTO ".$table_name." (".$str.")"." VALUES (".$newvalues.")");
        if($stmt-> execute($newval)){
            return self::$dbc->lastInsertId(); 
        } else {
            return false;
        }   
    }
    
    static function readonetable($table_name){
        //$keys_arr = array_keys($values);
        //$str = implode(",", $keys_arr);
        $stmt = self::$dbc->prepare(
                "SELECT * FROM ".$table_name);
        $stmt-> execute();
        $result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    static function singleRead($table_name, $namefield, $id){
        //$keys_arr = array_keys($values);
        //$str = implode(",", $keys_arr);
        $stmt = self::$dbc->prepare(
                "SELECT * FROM ".$table_name." WHERE ".$namefield."=".$id);
        //var_dump($stmt);
        $stmt-> execute();
        $result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    static function update($table_name, $cols, array $values){
        
       $stmt = self::$dbc->prepare(
                "UPDATE ".$table_name. " SET "); 
    }


//    DELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM
//tbl_name [WHERE where_condition] [ORDER BY
//...] [LIMIT row_count]
//    
//    
//    UPDATE [LOW_PRIORITY] [IGNORE] tbl_name SET
//col_name1={expr1|DEFAULT} [,
//col_name2={expr2|DEFAULT}] ... [WHERE
//where_condition] [ORDER BY ...] [LIMIT row_count]
}
