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
  	<div id="form-add-wrap">
  		<form class="admin-add-wrap" method="POST" enctype="multipart/form-data">
  			<div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-4">
	                        <div class="form-group">
	                        	<h4>Вы можете изменить информацию о существующей услуге:</h4>
								<label for="set_glificon">Изменить картинку (glyphicon - Bootstrap):</label>
								<input type="text" id="set_glificon" class="form-control" name="set_glificon" placeholder="glyphicon-envelope">
		                        <label for="set_photo_smoll">Изменить название:</label>
		                        <input type="text" id="set_servis_item" class="form-control" name="set_servis_item" placeholder="предоставляемая услуга">
		                        <label for="set_photo_smoll">Изменить описание</label>
		                        <textarea id="set_servis_text" class="form-control" name="set_servis_text" rows="10" style="width: 100%"></textarea>
							</div>
							<button id="send-settings" formmethod="post" name="send-settings" value="send-settings" class="btn btn-success">Добавить новую услугу</button>
                        </div>
                    </div>
                </div>
            </div>
  		</form>
  		<div class="messeges-exit"></div>
  	</div>

 

 
 
</body>
</html>