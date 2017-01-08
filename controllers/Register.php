<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Register_Controller extends Controller {
    
    //protected $model;
    //private $view;
    protected $modelName = 'RegisterModel';
    protected $viewName = 'RegisterView';
    private $formData=array();
    private $error;
    private $message;
    
    public function __construct() {
        parent::__construct();
    }

    public function run() {
       // parent::run();
        $this->model = new $this->modelName($this->outputData);
        $this->model->run($this->action, $this->id, $this->pNum);
        $this->view = new $this->viewName();
        $this->view->render($this->model->getDataPage()); 
       $this->check();        
    }
    protected function check(){
        if (isset($_POST['op'])){
            if (!empty($_POST['name']) && !empty($_POST['message'])){
                $this->formData = parent::sanitaze($_POST);
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
    public function getErrors(){
        echo $this->error;
    }
}