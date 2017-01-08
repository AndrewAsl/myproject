<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model {
    protected $id;//id материала из URL, переданный контроллером
    protected $table_name = '';//имя таблицы из БД
    protected $tables_names = [];//имя таблиц из БД для join-запросов
    protected $pNum = 1;//номер страницы сайта
    protected $pToPage = 10;//количество единиц информации на 1 страницу
    protected $psAmount;//количество страниц с информацией
    protected $pInfPerPage = [];//массив информации на одну страницу
    protected $dataPage = [];//массив всех данных для отображения во вью страницы
    protected $inputData =[];//массив входящих данных
    protected $method;
    

    public function __construct($inputData = []) {
        $this->inputData = $inputData;
        Db::connect();
        //Session::Control();
    }
    
    public function run($action='', $id='', $pNum=''){
        $this->method = $action;
        $this->id = $id;                
        $this->pNum = $pNum;
        if (method_exists($this, $this->method)){
            if($this->id){
                $this->{$this->method}($this->id);
            } else{
                $this->{$this->method}();
            }
            $status = 'Method exists';
        } else {
            $status = 'Method not exist';
        }     
    }
    
    protected function create (){
        Db::insert();
    }
    
    protected  function read ($id = ''){
       if ($id){
            $this->id = $id;
            Db::singleRead($this->id);  
       } else {
           Db::read($this->table_name);
       } 
    }
    
    protected function update ($id){
        $this->id = $id;
        Db::update($this->id);
    }
    
    protected function delete ($id){
        $this->id = $id;
        Db::delete($this->id);
    }
    
    public function getDataPage(){
        return $this->dataPage;
    }
    
}