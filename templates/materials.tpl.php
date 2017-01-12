<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($this->data);
?>
<div class="container">
    <h1>Статьи</h1>
    <?php if($_SESSION['username'] === 'admin'):?>
        <p><a href="/materials/create">CREATE</a></p>
    <?php endif;?>
    <table class='table table-striped'>
        <tr>
            <th>material_id</th>
            <th>mat_title</th>
            <th>anons</th>
            <th>material_price</th>
        </tr>
        <?php foreach ($this->data as $par):?>
        <tr>
            <td><?=$par['material_id'];?></td>
            <td><a href="<?=$_SERVER['REQUEST_URI']."/".$par['material_id']?>"><?=$par['mat_title'];?></a></td>
            <td><?=$par['anons'];?></td>
            <td><?=$par['material_price'];?></td>
            <?php if($_SESSION['username'] === 'admin'):?>
            <td><a href="">DELETE</a></td>
            <td><a href="">UPDATE</a></td>
            <?php endif;?>
        </tr>  
            <?php //var_dump($par);?>        
        <?php endforeach;?>
    </table>
</div>


