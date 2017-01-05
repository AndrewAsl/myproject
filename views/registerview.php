<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RegisterView extends View{
    
   protected function renderContent() {
        require './templates/authform.php';
       /*echo '
        <div class="container">
            <form>
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
            </div>
        ';*/
       /*echo'
           <div class="container">
       <form action="" method="get">
            <label for="name">Имя:</label><br>
            <input id="name" type="text" name="name" size="20" maxlength="20"
            value="' . $_POST['name'] .'"><br>
            <p>Поле Имя является обязательным <br> Должно состоять от 3 до 20 символов </p>
            <label for="name">Ваше сообщение:</label><br>
            <textarea name="message" rows="10" cols="30">'.$_POST['message'].'</textarea><br>
            <p>Поле Сообщение является обязательным <br> Должно состоять от 5 до 1000 символов </p>
            <input type="submit" name="op" value="Отправить">
        </form>
        </div>
         ';*/
    }
}