<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//use Core\Controller as Controller;
class Users_Controller extends Controller {
    protected $modelName = 'UserModel';
    protected $viewName = 'UserView';
   
    protected function setAction(){
        //var_dump($this->names);
        parent::setAction();
//        if ($this->names[1] === 'register'){
//            $this->action = 'create';
//        }
        if ($this->names[1] === 'ajax'){
            $this->action = 'getAjaxData';
        }
        if ($this->names[0] === 'ajax' && $this->names[1] === 'delete'){
            $this->action = 'delete';
        }
        if ($this->names[2] === 'update'){
            $this->action = 'update';
        }
        //var_dump($this->action);
    }
    
    protected function check(){
        if (isset($_POST['op'])){
            if (!empty($_POST['name']) && !empty($_POST['psw'])){
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