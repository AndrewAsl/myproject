<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data);
?>
<div class="container">
    <h1><?=$data['main'][0]['mat_title'];?></h1>
    <p><?=$data['main'][0]['body'];?></p>
    <?php if ($data['main'][0]['material_price'] != 0): ?>
        <h3><?=$data['main'][0]['material_price'];?></h3>
    <?php endif;?>
</div>


