<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View {

    public function __construct() {
        ob_start();
    }
    
    public function render($data){
        var_dump($_POST);
        require './templates/header.php';
        require './templates/base.page.php';
        require './templates/footer.php';
    }
    
}