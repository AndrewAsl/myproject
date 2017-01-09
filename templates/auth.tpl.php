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
            var pwd =  $('#psw').val();
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
        <label for="name">Имя:</label><br>
        <input id="name" type="text" name="name" size="80" maxlength="20"
        value="<?=$_POST['name']?>"><br>
        <label for="psw">Ваш пароль:</label><br>
        <input id="psw" name="psw" size="80" maxlength="20" type='password'><br>
          <label><input type="checkbox" name="check" id="check"> Запомнить меня</label><br>
        <input id="op" type="submit" name="op" value="Отправить">
    </form>
</div>
