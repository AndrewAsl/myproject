<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model {
    
    private $adress;
    private $datapage = [];

    public function __construct() {
        Db::connect();
    }
    
    public function run(){
        
    }
    
}