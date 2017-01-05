<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Controller {
    
    protected $controller;
    protected $model;
    protected $view;
    private $adress;
    private $names = [];

    public function __construct() {
        $this->adress=empty($_GET['uri'])?'main':$_GET['uri'];        
    }
    public function run() {
        $this->adress = rtrim($this->adress, '/');
        $this->names = explode('/', $this->adress);
        try {
            $name = ucfirst($this->names[0]).'_Controller';
            $this->controller = new $name;
            /*if(isset($this->names[2])) {
               $this->controller->{$this->names[1]}($this->names[2]);
            } else {
                if(isset($this->names[1])) {
                    $this->controller->{$this->names[1]}();
                }
            }*/
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