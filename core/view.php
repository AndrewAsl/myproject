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
        require './templates/header.php';
        $this->renderContent($data);        
        require './templates/footer.php';
    }
    
    protected function renderContent(array $data) {
        extract($data);
        require './templates/base.page.php';
//       foreach ($data as $value){ 
//            echo $value.'<br>';
//       }    
    }
    
}