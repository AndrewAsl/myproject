<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Controller {
    
    protected $model;
    protected $modelName;
    protected $viewName;
    protected $view;
    public $outputData = [];//POST запросы из форм вьюшек
    protected $action;
    protected $pNum;
    protected $id;    
    protected $names = [];
    
    public function __construct() {
        $this->adress=empty($_GET['uri'])?'main':$_GET['uri'];
        $this->pNum = isset($_GET['p'])?intval($_GET['p']):1;
    }
    public function run() {
        $this->adress = rtrim($this->adress, '/');
        $this->names = explode('/', $this->adress);
        $this->setAction();
        $this->check();
        if ($this->modelName && $this->viewName){
            $this->model = new $this->modelName($this->outputData);
            $this->model->run($this->action, $this->id, $this->pNum);
            $this->view = new $this->viewName($this->getNames());
            $this->view->render($this->model->getDataPage());            
        } else {
            exit();
        }    
    }
    
    protected function setAction(){
        $count = count ($this->names);
        if ($this->names[0] !== 'admin'){
            switch ($count) {
                case 1:                    
                    $this->action = 'read';
                    break;
                case 2:
                    $this->action = 'read';
                    $this->id = $this->names[1];
                    break;
            }
        } else {
            switch ($count) {
                case 2:                    
                    $this->action = 'read';                    
                    break;
                case 3:
                    if (is_string($this->names[2])){
                        $this->action = $this->names[2];
                    }
                    break;
                case 4:
                    $this->action = $this->names[3];
                    $this->id = $this->names[2];
                    break;
            }
        }
    }
    
    protected function check(){}
    

    protected function sanitaze($array){
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
    
    public function getNames(){
        return $this->names;
    }
    
}