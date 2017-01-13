<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data);
?>
<script type="text/javascript">
    $(function(){
        $('#create').click(function(e){
            var title = $('#mat_title').val();
            if (title === ''){
                e.preventDefault();
            } else {
                if ($('#choosebook').is(':hidden')){
                    //console.log('0');
                    $('#choosebook').val(0);
                }
                return;
            }
        });
        $('#choosebook').hide();
//        if ($('#choosebook').is(':hidden')){
//                console.log('0');
//            }
        
        $('#mat_type').change(function(){
            if ($('#mat_type option:selected').text() === 'Для книги'){                
                $.post("/ajax",{'book_id':'id','book_name':'bn'});
                $('#choosebook').show();
            } else {
                $('#choosebook').hide();
            }
        });
    });    
</script>

<div class="row">
   <form action="" method="post">
        <p>Ошибки</p>
        <p>
            <label for="mat_title">Название материала:</label><br>
            <input id="mat_title" type="text" name="mat_title" size="60" maxlength="45"
               value="<?=$_POST['mat_title']?>">
        </p>
        <p>
            <label>Выберите тип материала:</label><br>
            <select id="mat_type" name="mat_type">
                <?php foreach ($data['extra'][0] as $option):?>
                    <option value="<?=$option['mt_id']?>"><?=$option['mattype_titlel']?></option>
                <?php endforeach;?>
            </select>
        </p>
        <p id="choosebook">
            <label>Выберите книгу:</label><br>
            <select id="books" name="books">
                <?php foreach ($data['extra'][1] as $option):?>
                    <option value="<?=$option['book_id']?>"><?=$option['bookname']?></option>
                <?php endforeach;?>
            </select>
        </p>
        <p>
            <label for="anons">Анонс:</label><br>
            <textarea class="ckeditor" id="anons" name="anons" rows="10" cols="30"><?=$_POST['anons']?></textarea>
        </p>
        <p>
            <label for="body">Содержание материала:</label><br>
            <textarea class="ckeditor" id="body" name="body" rows="10" cols="30"><?=$_POST['body']?></textarea>
        </p>
        <p>
            <label for="material_price">Цена материала:</label><br>
            <input id="material_price" type="text" name="material_price" size="20" maxlength="20"
               value="<?=$_POST['material_price']?>">
        </p>
        <input id="create" type="submit" name="create" value="Создать">
    </form>
</div>
