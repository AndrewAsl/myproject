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
        echo 3;
        //var_dump($this->data);
        //var_dump($this->pageNames);
        //parent::includetpl($data);
        if ($this->pageNames[1] && !$this->pageNames[3]){
            include "./templates/".$this->tpl[1].".tpl.php";
        } elseif(!$this->pageNames[2]) {
            include "./templates/".$this->tpl[0].".tpl.php";
        }
        if ($this->pageNames[1] === 'create'){
            include "./templates/materialcreate.tpl.php";
        }
        if ($this->pageNames[2] == 'update'){
            //echo 3;
            include "./templates/materialupdate.tpl.php";
        }
    }
    
    //array_pad ( array $array , int $size , mixed $value )
    
}
