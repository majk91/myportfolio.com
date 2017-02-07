<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<div id="log"></div>

	<div class="mess-item-box">
        			<div class="row">
        				<div class="col-xs-12">
							<h4>Новое сообщение от потенциального клиента:</h4>
							<p>Время: '12.12'</p>
							<div class="row">
								<div class="col-md-4">
									<div>
										<p>ФИО:</p>
										<p>пупкин'</p>
									</div>
								</div>
								<div class="col-md-4">
									<div>
										<p>Телефон: </p>
										<p>'9379992'</p>
									</div>
								</div>
								<div class="col-md-4">
									<div>
										<p>Email: </p>
										<p>'апапапаап"мапапАап.ап'</p>
									</div>
								</div>
								<div class="col-md-12">
									<div>
										<p>Текст сообщения: </p>
										<p>'.$row["comment"].'</p>
									</div>
								</div>
							</div>
						</div>
        			</div>
					<div class="mess-item but-show" data-check_mess="1">
						<p>Отметить как просмотренное (внести в Базу)</p>
					</div>
					<div class="mess-item but-del" data-check_mess="1">
						<p>Удалить '.$row["id"].'</p>
					</div>
  	</div>

<?php mail("yuryshynets.m@gmail.com", "vbh", "слон", "молот"); ?>
 

 
 
</body>
</html>