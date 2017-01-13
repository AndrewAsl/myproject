<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data['main']);
//$data = array_slice($this->data, 0, count($this->data)-2);
?>
<div class="row">
    <h1>Статьи</h1>
    <?php if($_SESSION['username'] === 'admin'):?>
        <p><a href="/materials/create">CREATE</a></p>
    <?php endif;?>
    <table class='table table-striped'>
        <tr>
            <th>Номер материала</th>
            <th>Название материала</th>
            <th>Краткий анонс</th>
            <th>Стоимость</th>
            <?php if($_SESSION['username'] === 'admin'):?>
            <th colspan="2">Редактирование</th>
            <?php endif;?>
        </tr>
        <?php foreach ($data['main'] as $par):?>
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
        <?php endforeach;?>
    </table>
</div>


