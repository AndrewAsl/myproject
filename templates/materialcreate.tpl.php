<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    $(function(){
        $('#op').click(function(e){
            var nick = $('#name').val();
            var pwd =  $('#message').val();
            if (nick === '' || pwd === ''){
                e.preventDefault();
            } else {
                return;
            }
        });
    });
    
</script>
<!--div class="container">
    <form action="" method="post">
        <div class="form-group">
          <label for="nickname">Login:</label>
          <input type="text" class="form-control" id="nickname" placeholder="Enter login">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button name="op" type="submit" class="btn btn-default" >Submit</button>
    </form>
    </div-->

<div class="container">
   <form action="" method="post">
        <label for="mat_title">Название:</label><br>
        <input id="mat_title" type="text" name="mat_title" size="60" maxlength="45"
        value="<?=$_POST['mat_title']?>"><br>
        <label for="name">Ваше сообщение:</label><br>
        <textarea class="ckeditor" id="message" name="message" rows="10" cols="30"><?=$_POST['message']?></textarea><br>
        <p>Поле Сообщение является обязательным <br> Должно состоять от 5 до 1000 символов </p>
        <input id="op" type="submit" name="op" value="Отправить">
    </form>
</div>
