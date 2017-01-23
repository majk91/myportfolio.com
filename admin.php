    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yurishinec Mike Portfolio</title>

    <link rel="shortcut icon" href="image/favicon1.png" type="image/png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div id="admin-wrap">
    	<div class="container">
    		<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#home" data-toggle="tab">Основные настройки</a></li>
						<li><a href="#main-content" data-toggle="tab">Галерея портфолио</a></li>
						<li><a href="#slider-content" data-toggle="tab">Настройка слайдера</a></li>
						<li><a href="#messages" data-toggle="tab">Оповещение <span>(0)</span></a></li>
						<li><a href="#settings" data-toggle="tab">Дополнительные настройки</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<form class="admin-main">
                        		<div class="row">
	                        		<div class="col-md-12">
			                        	<p>Несколько языков на сайте?</p>
			                        	<input type="radio" class="form-item" name="lang" value="true" checked> Да
			                        	<input type="radio" class="form-item" name="lang" value="false"> Нет
			                        </div>
                        			<div class="col-md-12">
	                        			<p>Добавить логотип: <sup>*</sup></p>
                        			</div>
	                        		<div class="col-md-12">
	                        			<p>Фото:</p>
	                        			<input type="file" class="form-item" name="my-photo-logo">
	                        			<p>Текст Logo:</p>
	                        			<input type="text" name="my-logo-name" placeholder="Что-то!">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Имя: <sup>*</sup></p>  
										<input type="text" name="my-name" placeholder="Иванов">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Проффесия: <sup>*</sup></p>  
										<input type="text" name="name" placeholder="WEB DEWELOPER">
	                        		</div>
		                    		<div class="col-md-12">
	                        			<p>Фото: <sup>*</sup></p>  
										<input type="file" name="myPhoto" >
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Контакты: <sup>*</sup></p>  
										<input type="text" name="name" placeholder="Телефон" value="+380932164930"><br>
										<input type="text" name="name" placeholder="Viber"><br>
										<input type="text" name="name" placeholder="Skype"><br>
										<input type="text" name="name" placeholder="E-mail"><br>
	                        		</div>

									<button id="send-my-main">Отправить</button>
		                        	<div class="col-md-12">
		              		        	<div class="warning-box"></div><!--.warning-box-->
		                        	</div><!--.col-md-12-->
                        		</div><!--.row-->
							</form><!--.input-box-->
						</div>
						<div class="tab-pane" id="main-content">
                        	<form class="admin-my-portfilio">
                        		<div class="row">
                        			<div class="col-md-12">
	                        			<p>Добавить фото: <sup>*</sup></p>
                        			</div>
	                        		<div class="col-md-12">
	                        			<p>Обичная версия:</p>
	                        			<input type="file" class="form-item" name="photo-desktop">
	                        			<p>Мобильная версия:</p>
	                        			<input type="file" class="form-item" name="photo-mobile">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Название: <sup>*</sup></p>  
										<input type="text" name="name" placeholder="Что-то!">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Тип: <sup>*</sup></p>  
										<input type="text" name="name" placeholder="Магазин|Визитки|Страниццы посадки|Общий">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Заказчик: <sup>*</sup></p>  
										<input type="text" name="name" placeholder="Кто-то!">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Логотип заказчика: <sup>*</sup></p>  
										<input type="file" name="name">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Домен: <sup>*</sup></p>
										<input type="text" name="domen" placeholder="exemple.com.ua">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Дата: <sup>*</sup></p>
										<input type="text" name="date" placeholder="01.01.2017">
	                        		</div>
	                        		<div class="col-md-12">
	                        			<p>Дополнительно:</p>
										<textarea name="massege" class="form-item" rows="5"></textarea>
	                        		</div>
									<button id="send-main-content">Отправить</button>
		                        	<div class="col-md-12">
		              		        	<div class="warning-box"></div><!--.warning-box-->
		                        	</div><!--.col-md-12-->
                        		</div><!--.row-->
							</form><!--.input-box-->
						</div>
						<div class="tab-pane" id="slider-content">
							<div class="row">
								<div class="col-md-12">
									<h4>Наши клиенты</h4>
									<form class="admin-myClients">
										<div class="row">
			                        		<div class="col-md-12">
			                        			<p>Название компании: <sup>*</sup></p>  
												<input type="text" name="name" placeholder="Как-то там.">
			                        		</div>
		                        			<div class="col-md-12">
			                        			<p>Добавить фото: <sup>*</sup></p>
			                        			<input type="file" class="form-item" name="photo-client">
		                        			</div>
			                        		<div class="col-md-12">
			                        			<p>Прокрутка:</p>
			                        			<input type="radio" class="form-item" name="scrolling" value="true" checked> Да
			                        			<input type="radio" class="form-item" name="scrolling" value="false"> Нет
			                        		</div>
			                        		<div class="col-md-12">
			                        			<p>Количество отображаемых элементов: <sup>*</sup></p>  
												<select name="elements">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
			                        		</div>
			                        		<button id="send-slider-content">Отправить</button>

			                        	</div>
									</form>
								</div>
								<div class="col-md-12"><hr></div>								
								<div class="col-md-12">
									<h4>Отзывы клиентов</h4>
									<form class="admin-myClients">
										<div class="row">
			                        		<div class="col-md-12">
			                        			<p>ФИО: <sup>*</sup></p>  
												<input type="text" name="name1" placeholder="Как-то там.">
			                        		</div>
		                        			<div class="col-md-12">
			                        			<p>Кем работает: <sup>*</sup></p>
			                        			<input type="text" class="form-item" name="photo-client" placeholder="Как-то там.">
		                        			</div>
		                        			<div class="col-md-12">
			                        			<p>Где работает: <sup>*</sup></p>
			                        			<input type="text" class="form-item" name="photo-client" placeholder="Как-то там.">
		                        			</div>
		                        			<div class="col-md-12">
			                        			<p>Должность: <sup>*</sup></p>
			                        			<input type="text" class="form-item" name="photo-client" placeholder="Как-то там.">
		                        			</div>
			                        		<button id="send-slider-content">Отправить</button>
			                        	</div>
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="messages">
							<p>
							messages
							</p>
						</div>
						<div class="tab-pane" id="settings">
							<p>
							settings
							</p>
						</div>
					</div>
				</div>
    		</div>
    	</div>
    </div><!--#admin-wrap-->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/Slider.js"></script>
	<script src="js/function.js"></script>
	<script src="js/db-script.js"></script>
</body>
</html>