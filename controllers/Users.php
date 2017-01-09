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
    public $outputData;
    static $tplForView;

    
    protected function setAction(){
        //var_dump($this->names);
//        if ($this->names[1] == 'auth'){
//            $this->action = 'auth';
//            self::$formForView = 'auth';
//        }
//        if ($this->names[1] == 'register'){
            $this->action = self::$tplForView = $this->names[1];
//        }
    }
    
    public static function getTplView(){
        return self::$tplForView;
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