<?php 
	        		echo '<div class="mess-item-box">
        			<div class="row">
        				<div class="col-xs-12">
							<h4>Новое сообщение от потенциального клиента:</h4>
							<p>Время: '.$row["time"].'</p>
							<div class="row">
								<div class="col-md-2">
									<div>
										<p>ФИО:</p>
										<p>'.$row["name"].'</p>
									</div>
								</div>
								<div class="col-md-2">
									<div>
										<p>Телефон: </p>
										<p>'.$row["phone"].'</p>
									</div>
								</div>
								<div class="col-md-2">
									<div>
										<p>Email: </p>
										<p>'.$row["email"].'</p>
									</div>
								</div>
								<div class="col-md-6">
									<div>
										<p>Текст сообщения: </p>
										<p>'.$row["comment"].'</p>
									</div>
								</div>
							</div>
						</div>
        			</div>
					<div class="mess-item but-show hover-but" data-check_mess="'.$row["id"].'">
						<p>Отметить как просмотренное (внести в Базу)</p>
					</div>
					<div class="mess-item but-del hover-but" data-check_mess="'.$row["id"].'">
						<p>Удалить</p>
					</div>
        		</div>';
?>