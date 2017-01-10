<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainmodel
 *
 * @author Андрей
 */
class MaterialModel extends Model{
    protected $table_name = 'materials';
    
//    public function run ($action, $id, $pNum) {
//        $this->id = $id;
//        $this->method = $action;        
//        $this->pNum = $pNum;
//        //$act = 'read';
//        //var_dump($this->method);
//        if (method_exists($this, $this->method)){
//            $this->{$this->method}($this->id);
//            echo 'meth exists';
//        } else {
//            echo 'Method not exist';
//        } 
//    }
        
        
    protected function create (){
        Db::insert($this->table_name, $this->inputData);
    }
    
    protected  function read ($id = ''){
       if ($id){
            $this->id = $id;
            Db::singleRead($this->id);  
       } else {
           $this->dataPage = Db::readonetable($this->table_name);
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
