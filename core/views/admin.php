<?php require_once("/parts/_1.top_set.php") ?>
	<div id="admin-wrap">
    	<div class="container">
    		<div class="row admin_all_box" >
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#home" data-toggle="tab">Основные настройки</a></li>
						<li><a href="#main-content" data-toggle="tab">Галерея портфолио</a></li>
						<li><a href="#slider-content" data-toggle="tab">Настройка слайдера</a></li>
						<li><a href="#messages" data-toggle="tab" id="clientMess">Оповещение <span>(<?php showCounter() ?>)</span></a></li>
						<li><a href="#settings" data-toggle="tab">Дополнительные настройки</a></li>
					</ul>
					<div class="tab-content">
					<div><?php showMenyFunctions();?></div>
						<div class="tab-pane active" id="home">
							<form class="admin-main" method="POST" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-xs-12">
		                        		<div class="row">
		                        			<div class="col-xs-6 ">
		                        				<h3 class="text-center">Настройки</h3>
		                        				<p class="help-block">Здесь Вы можете внести основную информацию о пользователе, которая будет выводиться на сайте-портфолио</p>
		                        			</div>
		                        			<div class="col-xs-6 ">
		                        				<h3 class="text-center">Сохраненный параметры</h3>
		                        			</div>
		                        		</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
				                        <div class="row">
				                        	<div class="col-xs-6">
						                		<div class="form-group">
						                			<h4>Изменить favicon (ярлык сайта в закладках):</h4>
													<label for="set_favicon">Изменить favicon:</label>
						                			<input type="file" id="set_favicon" class="form-item btn btn-primary" name="set_favicon">
												</div>
						                		<div class="form-group">
						                			<h4>Изменить логотип:</h4>
													<label for="set_my_logo_name">Имя:</label>
													<input type="text" id='set_my_logo_name' class="form-control" name="set_my_logo_name" placeholder="Имя бренда">
													<label for="set_my_logo">Фамилия:</label>
													<input type="text" id='set_my_logo_lastname'class="form-control" name="set_my_logo_lastname" placeholder="Фамилия бренда">
												</div>
				                        	</div>
				                        	<div class="col-xs-6">
				                        		<div class="row">
						                        	<div class="col-xs-12">
								                		<div class="border-form">
								                			<h4>Favicon:</h4>
								                			<div class="show-favicon">
								                				<img src="/<?php echo selectItem('main_settings', 'favicon') ?>" alt="">
								                			</div>
														</div>
						                        	</div>
						                        	<div class="col-xs-12">
								                		<div class="border-form">
								                			<h4>Логотип:</h4>
								                			<div class="row">
								                				<div class="col-xs-6">
																	<p>Имя:</p>
																	<p><?php echo selectItem('main_settings', 'my_name_logo') ?></p>
								                				</div>
								                				<div class="col-xs-6">
																	<p>Фамилия:</p>
																	<p><?php echo selectItem('main_settings', 'my_lastname_logo') ?></p>
								                				</div>
								                			</div>
														</div>
						                        	</div>
				                        		</div>
				                        	</div>
				                        </div>
				                        <div class="border-bottom"></div>
				                        <div class="row">
				                        	<div class="col-xs-6">
												<div class="form-group">
													<h4>Изменить информацию о пользователе:</h4>
													<label for="set_name">Имя:</label>
													<input type="text" id="set_name" class="form-control" name="set_name" placeholder="Иванов Иван">
													<label for="set_proffesion">Проффесия:</label>
													<input type="text" id="set_proffesion" class="form-control" name="set_proffesion" placeholder="WEB DEWELOPER">
												</div>
				                        		<div class="form-group">
				                        			<h4>Изменить большое фото на главной:</h4>
					                    			<label for="set_myPhoto">Изменить фото: </label>
													<input type="file" id="set_myPhoto" class="btn btn-primary" name="set_myPhoto">
					                    		</div>
				                        	</div>
					                    	<div class="col-xs-6">
				                        		<div class="row">
						                        	<div class="col-xs-12">
								                		<div class="border-form">
								                			<h4>Информация о пользователе:</h4>
								                			<div class="row">
								                				<div class="col-xs-6">
																	<p>Имя:</p>
																	<p><?php echo selectItem('main_settings', 'my_name') ?></p>
								                				</div>
								                				<div class="col-xs-6">
																	<p>Проффесия:</p>
																	<p><?php echo selectItem('main_settings', 'profession') ?></p>
								                				</div>
								                			</div>
														</div>
						                        	</div>
						                        	<div class="col-xs-12">
								                		<div class="border-form">
								                			<h4>Большое фото на главной:</h4>
											    			<div class="show-favicon">
											    				<img src="/<?php echo selectItem('main_settings', 'my_photo')?> " alt="" width="90%">
											    			</div>
														</div>
						                        	</div>
				                        		</div>
				                        	</div>
				                        </div>
				                        <div class="border-bottom"></div>
				            		</div>
								</div>
		                       	<div class="col-xs-12">
									<button id="send-my-main" formmethod="post" name="admin-main" value="admin-main" class="btn btn-success">Обновить основную информацию пользователя</button>
		                       	</div>
							</form><!--.admin-main-->
							<form class="admin-contacts" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xs-12">
										<div class="row">
											<div class="col-xs-6">
	                        					<div class="form-group contact-send-box">
	                        						<h4>Изменить контакты:</h4>
		                        					<div class="phone-form-box">
		                        						<label for="set_phone">Изменить Телефон: </label><br>
														<input type="text" id="set_phone" name="set_phone" class="phone-number form-control" placeholder="Телефон">
														<div id="add-phone" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-phone" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
		                        					</div>
													<div class="viber-form-box">
														<label for="set_viber">Изменить Viber: </label><br>
														<input type="text" id="set_viber" name="set_viber" class="viber-number form-control" placeholder="Viber">
														<div id="add-viber" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-viber" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
													</div>
													<div class="skype-form-box">
														<label for="set_skype">Изменить Skype: </label><br>
														<input type="text" id="set_skype" name="set_skype" class="skype-number form-control" placeholder="Skype">
														<div id="add-skype" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-skype" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
													</div>
													<div class="E-mail-form-box">
														<label for="set_email">Изменить Email: </label><br>
														<input type="text" id="set_email" name="set_email" class="e-mail form-control" placeholder="E-mail">
														<div id="add-e-mail" class="add"><span class="glyphicon glyphicon-plus"></span></div>
														<div id="del-e-mail" class="dell"><span class="glyphicon glyphicon-minus"></span></div>
													</div>
	                        					</div>
											</div>
											<div class="col-xs-6">
				                        		<div class="row">
						                        	<div class="col-xs-12">
								                		<div class="border-form">
								                			<h4>Контакты:</h4>
								                			<div class="row">
								                				<?php echo selectContactAdmin() ?>
								                			</div>
								                		</div>
						                        	</div>
				                        		</div>
											</div>
										</div>
										<div class="border-bottom"></div>
									</div>
	                        		<div class="col-xs-12">
	                        			<button id="send-my-contact" formmethod="post" name="admin-contacts" value="admin-contacts" class="btn btn-success">Отправить контакты</button>
                        			</div>
								</div>
							</form>

							<div class="row">
		                  		<div class="col-xs-12">
		              	    		<div class="warning-box-main-set">
		              	    		</div><!--.warning-box-->
		                  		</div><!--.col-md-12-->
							</div>
						</div>
						<div class="tab-pane" id="main-content">
                        	<form class="admin-myPortfilio" method="POST" enctype="multipart/form-data">
                        		<div class="row">
                        		    <div class="col-xs-12 ">
                        				<h3 class="text-center">Контент основного слайдера</h3>
                        				<p class="help-block">Здесь можно добавить данные в основную галлерею работ</p>
                        			</div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-12">
                        				<div class="row">
                        					<div class="col-xs-4">
	                        					<div class="form-group">
	                        						<h4>Добавить фото:</h4>
													<label for="set_photo_big">Десктоп версия:</label>
					                        		<input type="file" id="set_photo_big" class="form-item btn btn-primary" name="set_photo_big">
												</div>
		                        				<div class="form-group">
		                        					<label for="set_photo_smoll">Мобильная версия:</label>
						                        	<input type="file" id="set_photo_smoll" class="form-item btn btn-primary" name="set_photo_smoll">
						                       	</div>
	                        					<div class="form-group">
	                        						<h4>Дополнительные данные</h4>
	                        						<label for="set_work_name">Название:</label>
													<input type="text" id="set_work_name" name="set_work_name" class="form-control" placeholder="Как-то..">
					                        		<label for="set_work_url">Режим доступа:</label>
													<input type="text" id="set_work_url" name="set_work_url" class="form-control" placeholder="exemple.com.ua">
					                        		<label for="set_work_category">Категория:</label>
					                        		<select id="set_work_category" name="set_work_category" class="form-control"  >
														<option value="Не определено" checked>Не определено</option>
														<option value="Магазин">Магазин</option>
														<option value="Визитки">Визитки</option>
														<option value="Страниццы посадки">Страниццы посадки</option>
													</select>
	                        					</div>
	                        					<div class="form-group">
	                        						<label for="set_client_name">Заказчик:</label>
													<input type="text" id="set_client_name" name="set_client_name" class="form-control" placeholder="Кто-то!">
	                        					</div>
                        					</div>
                        					<div class="col-xs-8">
	                        					<div class="row">
							                        <div class="col-xs-12">
									                	<div class="border-form">
									                		<h4>Загруженные работы:</h4>
									                		<div class="show-works">
																<div id="page-navigator">
																	<div id="page-1" class="active">
																		<div class="wrap">
																			<img src="/<?php echo selectItem('main_settings', 'favicon') ?>" alt="">
																			<div class="cross"></div>
																			<div class="magnifier" data-target='message0'></div>
																		</div>

																		<div id="dialog-message0" class="hid" title="Название">
																			<div class="dialog-box">
																				<div class="dialog-image-big">
																					<img src="/<?php echo selectItem('main_settings', 'favicon') ?>" alt="">
																				</div>
																				<div class="dialog-image-smoll">
																					<img src="/<?php echo selectItem('main_settings', 'favicon') ?>" alt="">
																				</div>
																				<a href=""></a>
																			</div>
																			<p>
																				<span>Заказчик: </span><br>
																				<span>Категория:</span>
																			</p>
																		</div> 
																		<div class="wrap">
																			<img src="/<?php echo selectItem('main_settings', 'favicon') ?>" alt="">
																			<div class="cross"></div>
																			<div class="magnifier" data-target='message1'></div>
																		</div>

																		<div id="dialog-message1" class="hid" title="Название">
																			<p>
																				Your22222 files have downloaded successfully into the My Downloads folder.
																			</p>
																		</div> 
																		<div class="wrap">
																			<img src="/<?php echo selectItem('main_settings', 'favicon') ?>"  alt="">
																			<div class="cross"></div>
																			<div class="magnifier" data-target='message2'></div>
																		</div>

																		<div id="dialog-message2" class="hid" title="Название">
																			<p>
																				Your33333 files have downloaded successfully into the My Downloads folder.
																			</p>
																		</div>
																		<div class="wrap">
																			<img src="/<?php echo selectItem('main_settings', 'favicon') ?>" alt="">
																			<div class="cross"></div>
																			<div class="magnifier" data-target='message3'></div>
																		</div>

																		<div id="dialog-message2" class="hid" title="Название">
																			<p>
																				Your33333 files have downloaded successfully into the My Downloads folder.
																			</p>
																		</div>
																		<div class="wrap">
																			<img src="/<?php echo selectItem('main_settings', 'favicon') ?>"  alt="">
																			<div class="cross"></div>
																			<div class="magnifier" data-target='message4'></div>
																		</div>

																		<div id="dialog-message2" class="hid" title="Название">
																			<p>
																				Your33333 files have downloaded successfully into the My Downloads folder.
																			</p>
																		</div>

																	</div>
																	<div id="page-2">p2
																	</div>
																	<div id="page-3">p3</div>
																	<div id="page-4">p4</div>
																	<div id="page-5">p5</div>
																	<div id="page-6">p6</div>
																</div>
																<nav>
																	<ul id="pagination" class="pagination">
																	<li><a href="#" data-target="first">&laquo;</a></li>
																	<li class="active"><a href="#" rel="page-1">1</a></li>
																	<li><a href="#" rel="page-2">2</a></li>
																	<li><a href="#" rel="page-3">3</a></li>
																	<li><a href="#" rel="page-4">4</a></li>
																	<li><a href="#" rel="page-5">5</a></li>
																	<li><a href="#" rel="page-6">6</a></li>
																	<li><a href="#" data-target="last">&raquo;</a></li>
																	</ul>
																</nav>
									                		</div>
														</div>
							                        </div>
					                        	</div>
                        					</div>
                        				</div>
                        			</div>
                        			<div class="col-xs-12">
	                        			<div class="row">
	                        				<div class="col-xs-6">
	                        				</div>
	                        				<div class="col-xs-6">
	                        				</div>
	                        			</div>
                        				<div class="border-bottom"></div>
                        			</div>
                        			<div class="col-xs-12">
										<button id="send-main-content" formmethod="post" name="admin-myPortfilio" value="admin-myPortfilio" class="btn btn-success">Отправить</button>
                        			</div>
                        		</div><!--.row-->
							</form><!--.admin-myPortfilio-->
							<div class="row">
		                   		<div class="col-md-12">
		          	        		<div class="warning-box"></div><!--.warning-box-->
		                   		</div><!--.col-md-12-->
							</div>
						</div>
						<div class="tab-pane" id="slider-content">
							<form class="admin-myClients" method="POST" enctype="multipart/form-data">
								<div class="row">
								    <div class="col-xs-12 ">
                        				<h3 class="text-center">Данные о клиентах</h3>
                        				<p class="help-block">Здесь можно добавить данные в клиентах для слайдеров</p>
                        			</div>
									<div class="col-xs-12">
										<div class="row">
			                        		<div class="col-xs-6">
												<div class="form-group">
													<h4>Наши клиенты:</h4>
													<label for="set_clientComp_name">Название компании:</label>
													<input type="text" id="set_clientComp_name" name="set_clientComp_name" class="form-control" placeholder="Как-то там.">
			                        				<label for="set_clientComp_logo">Добавить Логотип:</label>
			                        				<input type="file" id="set_clientComp_logo" name="set_clientComp_logo" class="form-item btn btn-primary"  >
			                        			</div>
			                        		</div>
			                        		<!--<div class="col-xs-6">
			                        			<div class="form-group">
			                        				<h4>Настройка слайдера:</h4>
			                        				<label for="set_scrolling">Цыкл:</label><br>
			                        				<input type="radio" class="form-item" name="set_scrolling" value="true" checked> Да
			                        				<input type="radio" class="form-item" name="set_scrolling" value="false"> Нет
			                        				<label for="set_show_el">Количество отображаемых элементов:</label><br>
													<select id="set_show_el" name="set_show_el" class="form-control">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3" checked>3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
			                    	    		</div>
			                    	    	</div> -->
			                    	    	<div class="col-xs-6">
			                    	    		<div class="row">
						                        	<div class="col-xs-12">
								                		<div class="border-form">
								                			<h4>Информация о пользователе:</h4>
								                			<div class="row">
								                				<div class="col-xs-6">
																	<p>Назваие компании:</p>
																	<p><?php echo selectItem('main_settings', 'my_name') ?>
																	</p>
								                				</div>
								                				<div class="col-xs-6">
																	<p>Логотип:</p>
																	<p><?php echo selectItem('main_settings', 'profession') ?>
																	</p>
								                				</div>
								                			</div>
														</div>
						                        	</div>
				                        		</div>
				                        	</div>
			                    	    </div>
									</div>
								</div>
			                	<div class="border-bottom"></div>
								<div class="row">
									<div class="col-xs-6">
										<div class="row">
					                       	<div class="col-xs-12">
												<div class="form-group">
													<h4>Отзывы клиентов</h4>
													<label for="set_clientTtem_name">ФИО:</label>
													<input type="text" id="set_clientTtem_name" name="set_clientTtem_name" class="form-control" placeholder="Пупкин И.И.">
					                        		<label for="set_client_work">Где работает:</label>
					                        		<input type="text" id="set_client_work" class="form-control" name="set_client_work" placeholder="Как-то там.">
					                        		<label for="set_client_position">Кем работает::</label>
					                        		<input type="text" id="set_client_position" class="form-control" name="set_client_position" placeholder="Директор">
					                        	</div>
					                        </div>
				                        	<div class="col-xs-12">
				                        		<div class="form-group">
													<label for="exampleInputFile">Текст отзыва:</label><br>
													<textarea id="set_review" class="form-control" name="set_review" rows="10" style="width: 100%" name="text"></textarea>
					                        	</div>
				                        	</div>
					                    </div>
									</div>
									<div class="col-xs-6">
										<div class="row">
					                       	<div class="col-xs-12">
												<div class="form-group">
													<h4>Отзывы клиентов:</h4>
								                	<div class="row">
								                		<div class="col-xs-6">
															<p>Ф.И.О.</p>
															<p><?php echo selectItem('main_settings', 'my_name') ?>
															</p>
								                		</div>
								                		<div class="col-xs-6">
															<p>Организация:</p>
															<p><?php echo selectItem('main_settings', 'profession') ?>
															</p>
								                		</div>
								                		<div class="col-xs-6">
								                			<p>Должность:</p>
															<p><?php echo selectItem('main_settings', 'profession') ?>
															</p>
								                		</div>
								                		<div class="col-xs-12">
								                			<p>Текст отзыва:</p>
															<p><?php echo selectItem('main_settings', 'profession') ?>
															</p>
								                		</div>
								                	</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="border-bottom"></div>
								<div class="row">						
				                    <div class="col-xs-12">
					                	<button id="send-slider-content" formmethod="post" name="admin-myClients" value="admin-myClients" class="btn btn-success">Отправить</button>
					                </div>
								</div>
							</form><!--.admin-myClients-->
						</div><!--#slider-content-->
						<div class="tab-pane" id="messages">
							<div class="messeges-box">
								<?php selectMessege() ?>
							</div>
							<div id="messeges-show-modal"></div>
							<div id="messeges-show-informer"></div>
						</div>
						<div class="tab-pane" id="settings">
							<form class="admin-plus" method="POST" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-xs-12">
		                        		<div class="row">
		                        			<div class="col-xs-12 ">
		                        				<h3 class="text-center">Настройки</h3>
		                        				<p class="help-block">Здесь Вы можете внести дополнительные настройки</p>
		                        			</div>
		                        		</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
						                <div class="border-form">
						                	<h4>Настройк учетных записей и прав пользователей (Выводяться все кроме пользователя под которым осуществлен вход)</h4>
				                        	<div class="row">
				                        		<?php echo showUsers() ?> 
											</div>
				                        </div>
				            		</div>
				            		<div id="settings-show-modal"></div>
									<div id="settings-show-informer"></div>
								</div>
				                <div class="border-bottom"></div>
								<div class="row">
                        			<div class="col-xs-12">
                        				<div class="row">
                        					<div class="col-xs-4">
	                        					<div class="form-group">
	                        						<h4>Добавить услугу (для дизайна желательно не более 6):</h4>
													<label for="set_glificon">Добавить картинку (glyphicon - Bootstrap):</label>
													<input type="text" id="set_glificon" class="form-control" name="set_glificon" placeholder="glyphicon-envelope">
		                        					<label for="set_photo_smoll">Добавить название:</label>
		                        					<input type="text" id="set_servis_item" class="form-control" name="set_servis_item" placeholder="предоставляемая услуга">
		                        					<label for="set_photo_smoll">Добавить описание:</label>
		                        					<textarea id="set_servis_text" class="form-control" name="set_servis_text" rows="10" style="width: 100%"></textarea>
												</div>
												<button id="send-set-item" formmethod="post" name="send-set-item" value="send-set-item" class="btn btn-success">Добавить новую услугу</button>
                        					</div>
                        					<div class="col-xs-8">
	                        					<div class="row">
							                        <div class="col-xs-12">
									                	<div class="border-form">
									            			<h4>Сохраненные услуги:</h4>
									                		<div class="show-settings">
									                			<div class="row">
									                				<div class="col-xs-12">
									                				<?php echo showServisaAdmin() ?>
																	</div>
									                			</div>
									                		</div>
														</div>
							                        </div>
					                        	</div>
                        					</div>
                        				</div>
                        			</div>
                        		</div><!--.row-->
                        		<div class="border-bottom"></div>
		                       	<div class="col-xs-12">
		                       	</div>
							</form><!--.admin-main-->
						</div>
					</div>
				</div>
    		</div>
    	</div>
    </div><!--#admin-wrap-->