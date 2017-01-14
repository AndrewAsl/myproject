<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usermodel
 *
 * @author Андрей
 */
class UserModel extends Model {
    protected $table_name = 'users';//имя таблицы из БД
    protected $fieldname = 'user_id';
    
    public function __construct($inputData) {
        parent::__construct($inputData);
        //Session::init();
        session_start();
        
    }
      
    function auth(){
        //Session::init();
        //session_start();
        if (count($this->inputData)>1){
            //header('Location: '.$_SERVER['PHP_SELF']);            
            Session::set('loggedIn', true);
            Session::set('userID', 1);
            Session::set('username', $this->inputData['name']);
            if ($this->inputData['check'] == 'on'){
                setcookie('myprojectsitename', serialize($_SESSION), time()+3600);
            }
            //var_dump($_SESSION);
            header('Location: /users');
            exit();            
        }
        
    }
    
    function login(){
        //Session::init();
        session_start();
        //var_dump($this->method);
        //var_dump($_SESSION);
        //var_dump($_COOKIE['PHPSESSID']);
        //var_dump($_REQUEST);
        //var_dump(SID);
    }
    
    function logout(){
        //Session::init();
        session_destroy();
        header('Location:/users/auth');
        exit();
    }
    
    protected function register(){
        parent::create();
    }
    
//    function (){
//        if (empty($this->inputData)){
//            return;
//        }
//        $ok = Db::insert($this->table_name, $this->inputData);
//        if($ok){
//            unset($this->inputData);
//            header ("Location: /materials");
//            exit();
//        } else {
//            echo $ok;
//        }  
//        
//    }
}
