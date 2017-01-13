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
    
    protected function setAction(){
        parent::setAction();
        if ($this->names[1] === 'create'){
            $this->action = 'create';
        }
        if ($this->names[1] === 'ajax'){
            $this->action = 'getAjaxData';
        }
    }
    
    protected function check(){
        if (isset($_POST['create'])){
            if (!empty($_POST['mat_title'])){
                unset($_POST['create']);
                if (empty($_POST['material_price'])){
                    $_POST['material_price'] = 0;
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
                    var_dump(mb_strlen($str));
                $wrap = wordwrap($str, $length*2, $token);
                  var_dump($wrap);
                $str_cut = mb_substr($wrap, 0, mb_strpos($wrap, $token, 0, $charset), $charset);    
                return $str_cut .= $end;
            } else {
                return $str;
            }
        }
}