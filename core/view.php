<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View {
    protected $data;
    protected $pageNames;

    public function __construct($names) {
        ob_start();
        $this->pageNames = $names;
        
    }
    
    public function render($data){
        $this->data = $data;
        require './templates/header.php';
        $this->renderContent();        
        require './templates/footer.php';
    }
    
    protected function renderContent() {
        $needtpl = array_slice($this->pageNames, 0, 2);
        var_dump($needtpl);
        if ($needtpl){
            foreach ($needtpl as $tpl){
                include "./templates/$tpl.tpl.php";
            }
        } else {
            foreach ($this->pageNames as $tpl){
                include "./templates/$tpl.tpl.php";
            }
        }
        
        
    }
    
}