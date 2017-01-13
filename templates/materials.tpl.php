<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data['main']);
//$data = array_slice($this->data, 0, count($this->data)-2);
?>
<script>
$(function(){
    $('a#del').click(function(e){
        e.preventDefault();
        console.log($('a#del').closest(this));
        $('td#itemid').each(function(i){
            console.log(i);
        }
                
        );
    });
//    $('a#del').each(function(i, e){
//        this.click(function(e){
//            //e.preventDefault();
//            alert('Вы действительно хотите удалить запись?');
//            var td = $('td#itemid');            
//            var material_id = td[i].text();
//            $.post("/ajax/delete/material", material_id);
//        });
//    });    
        
});
    
</script>
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
            <td id="itemid"><?=$par['material_id'];?></td>
            <td><a href="<?=$_SERVER['REQUEST_URI']."/".$par['material_id']?>"><?=$par['mat_title'];?></a></td>
            <td><?=$par['anons'];?></td>
            <td><?=$par['material_price'];?></td>
            <?php if($_SESSION['username'] === 'admin'):?>
            <td><a id="del" href="/admin/materials/<?=$par['material_id']?>/delete">DELETE</a></td>
            <td><a href="">UPDATE</a></td>
            <?php endif;?>
        </tr>       
        <?php endforeach;?>
    </table>
</div>


