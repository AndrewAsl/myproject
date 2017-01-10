<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kernel
 * 
 *
 * @author Андрей
 */
class Kernel {
    protected $controller;
    private $adress;
    private $names;
    
    public function __construct() {
        spl_autoload_register(function ($class) {
            if (mb_stripos($class, 'controller') !=0){
                $filename = explode('_', $class);
                $file = 'controllers/' . $filename[0] . '.php';
                if (file_exists($file)){
                    include $file;
                }
                else {
                    throw new Exception('404: Такой страницы не существует');
                }        
            }
            elseif (mb_stripos($class, 'model') !=0){
                include 'models/' . strtolower($class) . '.php';
            }
            elseif (mb_stripos($class, 'view') !=0){
                include 'views/' . strtolower($class) . '.php';
            }
            else {
                include 'core/' . $class . '.php';
            }    
        });
            session_start ();
    }

        public function run(){
            $this->adress=empty($_GET['uri'])?'main':$_GET['uri'];
            $this->adress = rtrim($this->adress, '/');
            $this->names = explode('/', $this->adress);            
            //var_dump($this->names);
            //var_dump($this->pNum);
            try {
                $name = ucfirst($this->names[0]).'_Controller';
                $this->controller = new $name;
                $this->controller->run();
            }
            catch(Exception $e)
        {
            //echo '404: ',  $e->getMessage(), "\n";
            $data = array();
            $data['content'] = $e->getMessage();
            $this->view = new View();
            $this->view->render($data);
        }
        
    }
    
}
