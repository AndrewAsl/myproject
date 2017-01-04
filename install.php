<?php

/* 
 * Это файл имитации инсталляции сайта.
 * Предназначен для установки данных администратора сайта.
 * Стандартные проверки на форму не идут, т.к. исходим из того,
 * что это действительно администратор.
 * После записи данных админа этот файл необходимо или удалить
 * или закомментировать в @index.php 
 */
try
{
    $pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT count(*) FROM users";
    $result = $pdo->query($query);
    //var_dump($result);
    foreach ($result as $res){
        //var_dump($res);
        if ($res[0] == 0){
            ob_start();
            echo '
                <form action="'.$_SERVER['SCRIPT_NAME'].'" method="post">
                    <label for="nickname">Имя:</label><br>
                    <input id="nickname" type="text" name="nickname" size="20" maxlength="20"
                    value="' . $_POST['nickname'] .'"><br>
                    <label for="password">Пароль:</label><br>
                    <input id="password" type="password" name="password" size="20" maxlength="20"
                    value="' . $_POST['password'] .'"><br>
                    <input type="submit" name="op" value="Отправить">
                </form>
                ';
            if (!empty($_POST['nickname']) && !empty($_POST['password'])){
                $nick = $_POST['nickname'];
                $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("INSERT INTO users (ur_id,nickname, password) "
                  . "VALUES (:ur_id, :nickname, :password)");
                $flag = $stmt->execute(array(':ur_id'=> 1, ':nickname' => $nick, ':password'=> $pass));
                if($flag){
                    ob_clean();
                    header('Location: http://' . $_SERVER['SERVER_NAME'] );//перезапрос страницы после успешной записи
                    exit();
                    //return true;
                }
            }
            exit();
        }
        else {
            //echo 'All right';
            return true;
            //header('Refresh:0; url= /index.php ');//перезапрос страницы после успешной записи
            
        } 
    }
    $pdo = NULL; //Закрываем соединение
}
catch (PDOException $e)
{
    echo $e->getMessage();
    exit();
}
