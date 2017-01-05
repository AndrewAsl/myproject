<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Register_Controller extends Controller {
    
    //protected $model;
    //private $view;
    private $formData=array();
    private $error;
    private $message;
    
    public function __construct() {
        parent::__construct();
    }

        public function run() {
        $this->model = new RegisterModel();
        //$this->model->run();
        
        $this->view = new RegisterView();
        //var_dump($this->model->getData());
        $this->view->render(array());
        $this->check();
        
    }
    private function check(){
        if (isset($_POST['op'])){
            if (!empty($_POST['name']) && !empty($_POST['message'])){
                $this->formData = $this->sanitaze($_POST);
                if($this->formData){
                    var_dump($this->formData);
                }
            } elseif (!$_POST['name'] || empty($_POST['name'])){
                $this->error .= 'Поле Имя обязательно для заполнения';
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