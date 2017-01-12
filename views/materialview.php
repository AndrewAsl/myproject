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
    
    protected function includetpl($data){
        parent::includetpl($data);
        if ($this->pageNames[1] === 'create'){
            include "./templates/materialcreate.tpl.php";
        } 
//        else {
//            include "./templates/".$this->tpl[0].".tpl.php";
//        }
    }
    
}
