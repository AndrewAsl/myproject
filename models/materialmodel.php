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
    protected $fieldname = 'material_id';
    
    
    public function getDataPage() {
        //parent::getDataPage();
        $this->dataPage['extra1'] = Db::readonetable('material_types');
        
        //$arr1 = $this->dataPage;
        //$this->dataPage = array_merge($arr1, $extra1, $extra2);
        //var_dump($this->dataPage);
        
        return $this->dataPage;
    }
    
    public function getAjaxData(){
        $this->dataPage['extra2'] = Db::readonetable('books');
        $jsn = json_encode($this->dataPage['extra2']);
        echo $jsn;
        exit();
    }
    
    protected function create (){
        echo 2;
        if (empty($this->inputData)){
            return;
        }
        $ok = Db::insert($this->table_name, $this->inputData);
        if($ok){
            unset($this->inputData);
            header ("Location: /materials");
            exit();
        } else {
            echo $ok;
        }        
    }
    
    protected function delete (){
        //$this->id = $id;
        $flag = Db::delete($this->table_name, $this->fieldname, $this->id);
        if ($flag){
            header('Location: /materials');
        }
        
    }
    
    protected function update (){
        echo 2;
        $this->dataPage['main'] = Db::singleRead($this->table_name,$this->fieldname, (int)$this->id);
        var_dump($this->inputData);
        Db::update($this->table_name, $this->inputData);
        //header('Location: /materials');
    }
}
