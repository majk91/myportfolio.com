<?php 
	$message = '
	<html>
	<head>
	  <title>Новое письмо с портала '.$_SERVER['SERVER_NAME'].'</title>
	</head>
	<body>
		<table width="100%" bgcolor="#e8e9ea" style="font-family:Arial,Helvetica,sans-serif;color:#333333; font-size:12px">
			<tbody width="80%" >
				<tr>
					<td>
						<table  width="50%"  style=" margin: 0 auto; border: 1px solid #111111; background: linear-gradient(limegreen,	transparent),linear-gradient(90deg, skyblue, transparent), linear-gradient( -90deg, coral, transparent);">
							<tbody width="80%" >
								<tr>
									<td>
										<table width="100%">
											<tbody>
												<tr>
													<td>
														<div>
															<h2 width="100%" style="text-align: center;">Новое сообщение от потенциального клиента</h2>
															<p>ФИО: <span>'.$name.'</span></p>
															<p>Телефон: <span>'.$phone.'</span></p>
															<p>Email: <span>'.$email.'</span></p>
															<p>Текст сообщения: <span>'.$mess.'</span></p>
														</div>
														<div>
															<p style="font-size: 20px;">Для входа в административную панель сайта перейдите по <a href="http://portfolio.com/main/login">ссылке</a>.</p>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
										<hr>
										<div  width="100%" style="text-align: center;">Вы получили это письмо, так как Ваша почта указана, как почта администратора на сайте portfolio.com</div>
										<hr>
										<div>
											<center>Copyright © 2017 Yuryshynets</center>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
	</html>';
?>