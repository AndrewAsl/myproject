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

    protected function check(){
        if (isset($_POST['create'])){
            if (!empty($_POST['mat_title'])){
                $this->outputData = parent::sanitaze($_POST);
            }    
        } else {
            return;
        }
    }
}