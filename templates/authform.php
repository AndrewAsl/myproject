<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($_SERVER);
?>
<script>
    function ifEmpty(){
        //alert('Stop');
        var inp = getElementsByTagName('input');
        console.log(inp);
        event.preventDefault();
    }
</script>
<div class="container">
    <form method="post">
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
        <button name="op" type="submit" class="btn btn-default" onclick="ifEmpty()">Submit</button>
    </form>
    </div>
