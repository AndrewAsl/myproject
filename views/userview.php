<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelviews
 *
 * @author Андрей
 */
class UserView extends View {
    //put your code here
    
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
}
