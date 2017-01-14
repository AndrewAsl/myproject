<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//use Core\Controller as Controller;
class Materials_Controller extends Controller {
    
    protected $modelName = 'MaterialModel';
    protected $viewName = 'MaterialView';
    
    public function run() {
        echo 1;
        $this->adress = rtrim($this->adress, '/');
        $this->names = explode('/', $this->adress);
        $this->setAction();
        $this->sessionControl();
        //var_dump($_SESSION);
        //var_dump($_SESSION['name']);
        //var_dump($this->action);
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
        //var_dump($this->names);
        parent::setAction();
        if ($this->names[1] === 'create'){
            $this->action = 'create';
        }
        if ($this->names[1] === 'ajax'){
            $this->action = 'getAjaxData';
        }
        if ($this->names[0] === 'ajax' && $this->names[1] === 'delete'){
            $this->action = 'delete';
        }
        if ($this->names[2] === 'update'){
            $this->action = 'update';
        }
        //var_dump($this->action);
    }
    
    protected function check(){
        if (isset($_POST['update']) || isset($_POST['create'])){
            if (!empty($_POST['mat_title'])){
                unset($_POST['update']);
                unset($_POST['create']);
                if (empty($_POST['material_price'])){
                    $_POST['material_price'] = (float)0;
                } else{
                    $_POST['material_price'] = (float)$_POST['material_price'];
                }
                if (empty($_POST['anons'])){
                    $_POST['anons'] = $this->_cutStr($_POST['body'], 400);
                }
                //$this->outputData = parent::sanitaze($_POST);
                $this->outputData = $_POST;
            }    
        } else {
            return;
        }
        //var_dump($this->outputData);
    }
        private function _cutStr($str, $length, $end = '...', $charset = 'UTF-8', $token = '~') {
            $str = strip_tags($str);
            if (mb_strlen($str, $charset) >= $length) {
                $wrap = wordwrap($str, $length*2, $token);
                $str_cut = mb_substr($wrap, 0, mb_strpos($wrap, $token, 0, $charset), $charset);    
                return $str_cut .= $end;
            } else {
                return $str;
            }
        }
}