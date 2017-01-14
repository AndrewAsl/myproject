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
        //var_dump($this->pageNames);
        
    }
    
    public function render($data){
        $this->data = $data;        
        require './templates/header.php';
        $this->renderContent();
        require './templates/footer.php';
    }
    
    protected function renderContent() {
        $data['main'] = $this->data['main'];
        $extra = array();
        for($i=1; $i<=count($this->data); $i++){
            $extra['extra'][] = $this->data['extra'.$i];            
        }        
        $data = array_merge($data, $extra);
        //var_dump($data);
        $this->includetpl($data);
    }
    
    
    protected function includetpl($data){
        //$this->data;
        //$data = $this->renderContent();
        //var_dump($this->pageNames);
        if ($this->pageNames[1]){
            include "./templates/".$this->tpl[1].".tpl.php";
        } else {
            include "./templates/".$this->tpl[0].".tpl.php";
        }
              
    }
    
}