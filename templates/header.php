<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data[1]['title'];?></title>
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.css" rel="stylesheet">
      <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<body>
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">My project</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/materials">Статьи</a>
                </li>
                <!--li>
                    <a href="/books">Книги</a>
                </li-->
                <?php if($_SESSION['username'] === 'admin'):?>
                 <li>
                    <a href="/users">Пользователи</a>
                </li>
                <?php endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if($_SESSION[loggedIn]):?>
                <li><a href="/users/<?=$_SESSION['userID']?>">Hello,<?=$_SESSION['username']?></a></li>
                <li><a href="/users/logout">Выход</a></li>
                <?php else:?>
                <li><a href="/users/auth">Войти</a></li>
                <li><a href="/users/register">Регистрация</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="padding-top: 0">    

