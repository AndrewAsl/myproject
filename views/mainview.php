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
    protected $tpl =['main'];
    protected function renderContent() {
          return $formatdata = $this->data;   
        
    }
}
