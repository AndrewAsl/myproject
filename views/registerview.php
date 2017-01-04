<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RegisterView extends View{
    
    public function render($data = array()) {
        //parent::render($data);
        require './templates/header.php';
        require './templates/authform.php';
        require './templates/footer.php'; 
    }
}