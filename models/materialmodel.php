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
    
    protected  function read (){
        //var_dump($this->id);
       if (!empty($this->id)){
           $this->dataPage = Db::singleRead($this->table_name,$this->fieldname, (int)$this->id);  
       } else {
           $this->dataPage = Db::readonetable($this->table_name);
       } 
    }
    
}
