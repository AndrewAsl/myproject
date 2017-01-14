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
    protected $tpl =['user','auth'];
    
    protected  function includetpl($data) {
        //parent::includetpl($data);
        if ($this->pageNames[1] === 'register'){
            include "./templates/register.tpl.php";
        }
    }
}
