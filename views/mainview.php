<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainviews
 *
 * @author Андрей
 */
class MainView extends View {
    //put your code here
    /*public function __construct() {
        parent::__construct();
    }
    public function render($data) {
        parent::render($data);
    }*/
    protected function renderContent() {
        require './templates/base.page.php';
    }
}
