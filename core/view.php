<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View {
    protected $data;
    protected $pageNames;
    protected $tpl =[];

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
        $main = $this->data['main'];
        for($i=1; $i<count($this->data); $i++){
            $extra.$i = $this->data['extra'.$i];
        }
        $this->includetpl();
    }
    
    
    protected function includetpl(){
        //$this->data;
        //$data = $this->renderContent();
        //var_dump($data);
        if ($this->pageNames[1]){
            include "./templates/".$this->tpl[1].".tpl.php";
        } else {
            include "./templates/".$this->tpl[0].".tpl.php";
        }
              
    }
    
}