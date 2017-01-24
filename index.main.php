<?php require("core/functions.php")   ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yurishinec Mike Portfolio</title>

    <link rel="shortcut icon" href="image/<?php echo getSetInf(main_settings, favicon) ?>" type="image/png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div class="site-wrapper">
        <div class="home-wraper">
        
<?php require_once("parts/_1header.php") ?>

<?php require_once("parts/_2home.php") ?>

        </div><!--.home-wraper-->

<?php require_once("parts/_3servis.php") ?>

<?php require_once("parts/_4clients.php") ?>

<?php /*require_once("parts/_5rezume.php")*/ ?>

<?php require_once("parts/_6myWorks.php") ?>

<?php require_once("parts/_7reviews.php") ?>

<?php require_once("parts/_8contact.php") ?>

<?php require_once("parts/_9footer.php") ?>



    </div><!--.site-wrapper-->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/Slider.js"></script>
	<script src="js/function.js"></script>
</body>
</html>