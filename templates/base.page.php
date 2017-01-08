<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">
    <h1><?=$content;?></h1>
    <?php if(isset($data[0]['book_id'])):?>
    <table class='table table-striped'>
        <tr>
            <th>book_id</th>
            <th>bookname</th>
            <th>book_price</th>
        </tr>
        <?php foreach ($data as $par):?>
        <tr>
            <td><?=$par['book_id'];?></td>
            <td><?=$par['bookname'];?></td>
            <td><?=$par['book_price'];?></td>
        </tr>  
            <?php //var_dump($par);?>        
        <?php endforeach;?>
    </table>
     <?php endif;?>
</div>


