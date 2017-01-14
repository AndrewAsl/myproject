<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var_dump($data);
?>

<div class="row">
   <form action="" method="post">
        <p>Ошибки</p>
        <p>
            <label for="mat_title">Название материала:</label><br>
            <input id="mat_title" type="text" name="mat_title" size="60" maxlength="45"
               value="<?=$data['main'][0]['mat_title']?>">
        </p>
        <p>
            <label for="anons">Анонс:</label><br>
            <textarea class="ckeditor" id="anons" name="anons" rows="10" cols="30"><?=$data['main'][0]['anons']?></textarea>
        </p>
        <p>
            <label for="body">Содержание материала:</label><br>
            <textarea class="ckeditor" id="body" name="body" rows="10" cols="30"><?=$data['main'][0]['body']?></textarea>
        </p>
        <p>
            <label for="material_price">Цена материала:</label><br>
            <input id="material_price" type="text" name="material_price" size="20" maxlength="20"
               value="<?=$data['main'][0]['material_price']?>">
        </p>
        <input id="create" type="submit" name="update" value="Изменить">
        <input id="reset" type="reset" name="reset" value="Сбросить">
    </form>
</div>
