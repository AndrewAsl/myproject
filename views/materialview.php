<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainviews
 *
 * @author Андрей
 */
class MaterialView extends View {
    protected $tpl =['materials', 'onematerial'];
    
    protected function includetpl(){
        //var_dump($this->data);
        parent::includetpl();
        if ($this->pageNames[1] === 'create'){
            include "./templates/materialcreate.tpl.php";
        } 
    }
//    protected function renderContent() {
//        foreach ($this->data as $data){
//            foreach ($data as $field => $fieldvalue){
//                $formatdata[$field] = $fieldvalue;
//            }
//            return $formatdata;
//        }             
//    }
    
}
