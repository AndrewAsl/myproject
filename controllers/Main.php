<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author Андрей
 */
class Main_Controller extends Controller {
    //put your code here
    public function run(){
        $this->model = new MainModel();
        //$this->model->setAdress($this->getAdress());
        //$this->model->run();
        $this->view = new MainView();
        $this->view->render(array());
    }
}
