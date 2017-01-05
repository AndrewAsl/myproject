<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//use Core\Controller as Controller;
class Register_Controller extends Controller {
    
    private $model;
    private $view;
    private $formData=array();
    private $error;
    private $message;
    
    public function __construct() {
        parent::__construct();
        $this->check();
    }

        public function run() {
        
        //echo 'this is page Authentification';
        //exit();
        //var_dump($this->adress);
        //$this->model = new RegisterModel();
        $this->view = new RegisterView();
        //var_dump($this->model->getData());
        $this->view->render(array());
        if($this->error){
            $this->getErrors();
        }
        $this->getErrors();
        
    }
    private function check(){
        if (isset($_POST['op'])){
            if (!empty($_POST['nickname']) && !empty($_POST['pwd'])){
                $this->formData = $this->sanitaze($_POST);                
            } elseif (!$_POST['nickname'] || empty($_POST['nickname'])){
                $this->error .= 'Поле Имя обязательно для заполнения';
                //var_dump($this->error);
                //exit();
                //header('Refresh');
            } else{
                $this->error .= 'Поле Сообщение обязательно для заполнения';
            }
        } else {
            return;
        }        
    }
    
    private function sanitaze($array){
        foreach ($array as $key=>$value) {
            $value = trim($value);
            $value = strip_tags($value);
            $value = str_replace("\t", ' ', $value);
            $value = str_replace(array("\r\n", "\n\r", "\r", "\n"), '<br/>', $value);
            $value = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $array[$key] = $value;
        }
        return $array;
    }
    
    public function getErrors(){
        echo $this->error;
    }
}