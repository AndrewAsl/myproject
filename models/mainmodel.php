<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainmodel
 *
 * @author Андрей
 */
class MainModel extends Model{
    
    public function getDataPage() {
        return $this->dataPage = array('content'=>'Hello World!');
    }
}
