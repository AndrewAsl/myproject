<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//use Core\Controller as Controller;
class Auth_Controller extends Controller {
    
    private $model;
    private $view;
    
    public function run() {
        
        //echo 'this is page Authentification';
        //exit();
        //var_dump($this->adress);
        $this->model = new AuthModel();
        $this->view = new AuthView();
        //var_dump($this->model->getData());
        $this->view->render($this->model->getData());
        
        
    }
}