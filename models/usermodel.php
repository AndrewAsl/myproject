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
    //put your code here
    protected $id;//id материала из URL, переданный контроллером
    protected $table_name = '';//имя таблицы из БД
    protected $tables_names = [];//имя таблиц из БД для join-запросов
    protected $pNum = 1;//номер страницы сайта
    protected $pToPage = 10;//количество единиц информации на 1 страницу
    protected $psAmount;//количество страниц с информацией
    protected $pInfPerPage = [];//массив информации на одну страницу
    //protected $dataPage = [];//массив всех данных для отображения во вью страницы
    public $inputData =[];//массив входящих данных
    protected $method; 
    
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
            header('Location: /users/login');
            exit();            
        }
        
    }
    
    function login(){
        //Session::init();
        //session_start();
        var_dump($this->method);
        var_dump($_SESSION);
        var_dump($_COOKIE['PHPSESSID']);
        var_dump($_REQUEST);
        var_dump(SID);
    }
    
    function logout(){
        //Session::init();
        session_destroy();
        header('Location:/users/auth');
        exit();
    }
    
    function register(){
        var_dump(get_object_vars($this));
    }
}
