<?php require("php/functions.php")   ?>
 
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
                        			<div class="col-xs-6 ">
                        				<h3 class="text-center">Настройки</h3>
                        				<p class="help-block">Здесь Вы можете внести основную информацию о пользователе, которая будет выводиться на сайте-портфолио</p>
                        			</div>
                        			<div class="col-xs-6 ">
                        				<h3 class="text-center">Сохраненный параметры</h3>
                        			</div>
	                        	<!--	<div class="col-md-12">
			                        	<p>Несколько языков на сайте?</p>
			                        	<input type="radio" class="form-item" name="lang" value="true" checked> Да
			                        	<input type="radio" class="form-item" name="lang" value="false"> Нет
			                        </div> -->
                        			<div class="col-xs-12">
	                        			<div class="row">
	                        				<div class="col-xs-6">
			                        			<div class="form-group">
													<label for="exampleInputFile">Добавить логотип:</label>
													<p>Текст Logo:</p>
													<p>Имя:</p>
													<input type="text" class="form-control" name="my-logo-name" placeholder="Имя бренда">
													<p>Фамилия:</p>
													<input type="text" class="form-control" name="my-logo-lastname" placeholder="Фамилия бренда">
												</div>
	                        				</div>
	                        				<div class="col-xs-6">
		                        				<div class="border-form">
			                        				<div class="row">
		                        						<div class="col-xs-6">
				                        					<p>Текст Logo:</p>
				                        					<p><?php echo getSetInf(main_settings, my_name_logo) ?></p>
				                        					<p><?php echo getSetInf(main_settings, my_lastname_logo) ?></p>
		                        						</div>
		                        					</div>
		                        				</div>
	                        				</div>
	                        				<div class="border-bottom"></div>
	                        			</div>
	                        			<div class="row">
	                        				<div class="col-xs-6">
			                        			<div class="form-group">
													<label for="exampleInputFile">Добавить favicon (ярлык сайта в закладках):</label>
			                        				<p>Фото:</p>
			                        				<input type="file" id="exampleInputFile" class="form-item btn btn-primary" name="my-photo-logo">
												</div>
	                        				</div>
	                        				<div class="col-xs-6">
		                        				<div class="border-form">
			                        				<div class="row">
		                        						<div class="col-xs-6">
				                        					<p>Ярлык сайта в закладках:</p>
				                        					<img src="image/<?php echo getSetInf(main_settings, favicon) ?>" width="20%" alt="logo">
		                        						</div>
		                        					</div>
		                        				</div>
	                        				</div>
	                        				<div class="border-bottom"></div>
	                        			</div>
	                        			<div class="row">
	                        				<div class="col-xs-6">
												<div class="form-group">
													<label for="exampleInputFile">О пользователе: </label>
													<p>Имя:</p> 
													<input type="text" class="form-control" name="my-name" placeholder="Иванов Иван">
				                        			<p>Проффесия:</p>  
													<input type="text" class="form-control" name="name" placeholder="WEB DEWELOPER">
												</div>
	                        				</div>
	                        				<div class="col-xs-6">
		                        				<div class="border-form">
		                        					<div class="row">
		                        						<div class="col-xs-6">
				                        					<p>Имя:</p>
				                        					<p><?php echo getSetInf(main_settings, my_name) ?></p>
		                        						</div>
		                        						<div class="col-xs-6">
				                        					<p>Проффесия:</p>
				                        					<p><?php echo getSetInf(main_settings, profession) ?></p>
		                        						</div>
		                        					</div>
		                        				</div>
	                        				</div>
	                        				<div class="border-bottom"></div>
	                        			</div>
	                        			<div class="row">
		                        			<div class="col-xs-6">
	                        					<div class="form-group">
		                        					<label for="exampleInputFile">Большое фото на главной: </label>
				                        			<p>Фото: </p>  
													<input type="file" name="myPhoto" class="btn btn-primary" >
		                        				</div>
	                        				</div>
	                        				<div class="col-xs-6">
		                        				<div class="border-form">
		                        					<p>Фото: </p>
		                        					<img src="image/<?php echo getSetInf(main_settings, my_photo) ?>" width="40%" alt="logo">
		                        				</div>
	                        				</div>
	                        				<div class="border-bottom"></div>
	                        			</div>
	                        			<div class="row">
	                        				<div class="col-xs-6">
	                        					<div class="form-group contact-send-box">
		                        					<label for="exampleInputFile">Контакты: </label>
		                        					<div class="phone-form-box">
					                        			<p>Телефон:</p>  
														<input type="text" name="phone-number" class="phone-number form-control" placeholder="Телефон">
														<div id="add-phone" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-phone" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
		                        					</div>
													<div class="viber-form-box">
														<p>Viber:</p>
														<input type="text" name="viber-number" class="viber-number form-control" placeholder="Viber">
														<div id="add-viber" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-viber" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
													</div>
													<div class="skype-form-box">
														<p>Skype:</p>
														<input type="text" name="skype-number" class="skype-number form-control" placeholder="Skype">
														<div id="add-skype" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-skype" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
													</div>
													<div class="E-mail-form-box">
														<p>E-mail:</p>
														<input type="text" name="e-mail" class="e-mail form-control" placeholder="E-mail">
														<div id="add-e-mail" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-e-mail" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
													</div>
	                        					</div>
	                        				</div>
	                        				<div class="col-xs-6">
				                        		<div class="border-form">
	                        						<div class="row">
	                        							<div class="col-xs-6">
				                        					<p><b>Телефон</b>: <br></p>
				                        					<?php echo getSetInf(contacts, phone) ?>
				                        					<p><b>Viber</b>: <br></p>
				                        					<?php echo getSetInf(contacts, viber) ?>
				                        				</div>
				                        				<div class="col-xs-6">
				                        					<p><b>Skype</b>: <br></p>
				                        					<?php echo getSetInf(contacts, skype) ?>
				                        					<p><b>E-mail</b>: <br></p>
				                        					<?php echo getSetInf(contacts, e_mail) ?>
				                        				</div>
	                        						</div>
	                        					</div>
	                        				</div>
	                        				<div class="border-bottom"></div>
	                        			</div>
                        			</div>
                        			<div class="col-xs-12">
										<button id="send-my-main" class="btn btn-success">Отправить</button>
                        			</div>

		                        	<div class="col-md-12">
		              		        	<div class="warning-box-main-set"></div><!--.warning-box-->
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