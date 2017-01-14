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
    protected $fieldname;
    

    public function __construct($inputData) {
        $this->inputData = $inputData;
        Db::connect();
    }
    
    public function run($action, $id, $pNum){
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
        $ok = Db::insert($this->table_name, $this->inputData);
        if($ok){
            unset($this->inputData);
            header ("Location: /");
            exit();
        } else {
            var_dump($ok);
        }        
    }
    
    protected  function read (){
       if (!empty($this->id)){
            $this->dataPage['main'] = Db::singleRead($this->table_name,$this->fieldname, (int)$this->id);  
       } else {
           $this->dataPage['main'] = Db::readonetable($this->table_name);
       } 
    }
    
    protected function update (){
        $this->dataPage['main'] = Db::singleRead($this->table_name,$this->fieldname, (int)$this->id);
        Db::update($this->table_name, $this->inputData);
    }
    
    protected function delete (){
        Db::delete($this->table_name, $this->fieldname, $this->id);
        
    }
    
    public function getDataPage(){
        return $this->dataPage;
    }
    
}