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

//    protected function setAction() {
//        parent::setAction();
//        
//    }
    protected function check(){
        if (isset($_POST['op'])){
            if (!empty($_POST)){
                $this->outputData = parent::sanitaze($_POST);
            } elseif (!$_POST['name'] || empty($_POST['name'])){
                $this->error .= 'Поле Имя обязательно для заполнения';
            } else{
                $this->error .= 'Поле Сообщение обязательно для заполнения';
            }
        } else {
            return;
        }
    }
}