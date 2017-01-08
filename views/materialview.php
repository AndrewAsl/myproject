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
class MaterialView extends View {
  protected function renderContent(array $data) {
        //extract($data);
        require './templates/base.page.php';
//       foreach ($data as $value){ 
//            echo $value.'<br>';
//       }    
    }  
}
