<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainviews
 *
 * @author Андрей
 */
class MaterialView extends View {
  protected function renderContent() {
        //extract($data);
        $tpl = Users_Controller::getTplView();
        //var_dump($tpl);
        if ($tpl){
            require "./templates/$tpl.tpl.php";
        } else {
            echo 'Temlate isn\'t founded';
        }    
//        if ($form === 'auth'){
//            require './templates/authform.php';
//        } elseif ($form === 'register'){
//            require './templates/registerform.php';
//        }
            
//       foreach ($data as $value){ 
//            echo $value.'<br>';
//       }    
    }
    
    protected function setAction(){
        if($this->names[1]){
            $this->action = self::$tplForView = $this->names[1];
        } else {
            self::$tplForView = $this->names[0];
        }    
    }
}
