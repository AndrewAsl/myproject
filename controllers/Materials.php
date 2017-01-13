<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//use Core\Controller as Controller;
class Materials_Controller extends Controller {
    
    protected $modelName = 'MaterialModel';
    protected $viewName = 'MaterialView';
    
    protected function setAction(){
        parent::setAction();
        if ($this->names[1] === 'create'){
            $this->action = 'create';
        }
        if ($this->names[1] === 'ajax'){
            $this->action = 'getAjaxData';
        }
    }
    
    protected function check(){
        if (isset($_POST['create'])){
            if (!empty($_POST['mat_title'])){
                unset($_POST['create']);
                $this->outputData = parent::sanitaze($_POST);
            }    
        } else {
            return;
        }
        //var_dump($this->outputData);
    }
}