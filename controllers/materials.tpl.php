<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var_dump($data);
?>
<div class="container">
    <table class='table table-striped'>
        <tr>
            <th>material_id</th>
            <th>mat_title</th>
            <th>anons</th>
            <th>material_price</th>
        </tr>
        <?php foreach ($data as $par):?>
        <tr>
            <td><?=$par['material_id'];?></td>
            <td><?=$par['mat_title'];?></td>
            <td><?=$par['anons'];?></td>
            <td><?=$par['book_price'];?></td>
        </tr>  
            <?php //var_dump($par);?>        
        <?php endforeach;?>
    </table>
</div>


