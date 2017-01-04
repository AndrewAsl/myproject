<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'install.php';
spl_autoload_register(function ($class) {
    if (mb_stripos($class, 'controller') !=0){
        $filename = explode('_', $class);
        $file = 'controllers/' . $filename[0] . '.php';
        if (file_exists($file)){
            include $file;
        }
        else {
            throw new Exception('404: Такой страницы не существует');
        }        
    }
    elseif (mb_stripos($class, 'model') !=0){
        include 'models/' . strtolower($class) . '.php';
    }
    elseif (mb_stripos($class, 'view') !=0){
        include 'views/' . strtolower($class) . '.php';
    }
    else {
        include 'core/' . $class . '.php';
    }    
});
$run = new Controller();
$run->run();