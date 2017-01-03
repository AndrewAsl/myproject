<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthModel extends Model{
    private $datapage = [];
    
    function __construct() {
        parent::__construct();
        $this->Data();
        //var_dump($this->datapage);
        
    }
    private function Data(){
        $data = 'Auth Model';
        $this->datapage[1]['text'] = $data;
    }
    public function getData() {
        return $this->datapage;
    }
    
}