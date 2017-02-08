<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php selectItem("main_settings", "my_name") ?></title>

    <link rel="shortcut icon" href="" type="<?php echo "/".selectItem("main_settings", "favicon") ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="site-wrapper">
        <div class="login_panel">
            <div class="container">
            <div class="row ">
                <div class="col-xs-12">
                    <ul class="text-right">
                        <li><a href="/main/registration">Регистрация</a></li>
                            <?php if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])){
                                    echo '<li><a href="/main/loguot">Выход</a></li>';
                                    if($_SERVER["REQUEST_URI"]!='/'){
                                        echo '<li><a href="/">Главная</a></li>';
                                    }
                                }else{
                                    echo '<li><a href="/main/login">Вход</a></li>';
                                } ?>
                    </ul>
                </div>
            </div>
            </div>   
        </div>