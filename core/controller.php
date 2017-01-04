<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//namespace Core;
class Controller {
    
    private $controller;
    private $model;
    private $view;
    private $adress;
    private $names = [];

    public function __construct() {
        $this->adress=empty($_GET['uri'])?'home':$_GET['uri'];
        
    }
    public function run() {
        $this->names = explode('/', $this->adress);
        //var_dump($_GET);
        //var_dump($this->names);
        if ($this->names[0] == 'home'){
            $this->model = new Model();
            $this->model->setAdress($this->getAdress());
            $this->model->run();
            $this->view = new View();
            $this->view->render($this->model->getData());
            exit();
        }
        try {
            $name = ucfirst($this->names[0]).'_Controller';
            $this->controller = new $name;
            $this->controller->run();
        } 
        catch(Exception $e)
        {
            //echo '404: ',  $e->getMessage(), "\n";
            $data = array();
            $data[1]['text'] = $e->getMessage();
            $this->view = new View();
            $this->view->render($data);
        }       
        
    }
    
    public function getAdress(){
        return $this->adress;
    }
    
}