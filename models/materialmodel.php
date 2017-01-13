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
        //echo 'this ajax';
        $this->dataPage['extra2'] = Db::readonetable('books');
        //var_dump($this->dataPage['extra2']);
        $jsn = json_encode($this->dataPage['extra2']);
        echo $jsn;
        //return $jsn;
        //exit();
    }
    
    protected function create (){
        $ok = Db::insert($this->table_name, $this->inputData);
    }
}
