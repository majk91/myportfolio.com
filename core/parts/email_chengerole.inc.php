<?php 
	$message = '
	<html>
	<head>
	  <title>Изменение прав доступа '.$_SERVER['SERVER_NAME'].'</title>
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
															<h2 width="100%" style="text-align: center;">Новое сообщение о изменениях в правах доступа</h2>
															<p>Уважаемый пользователь '.$login.', ваши права доступа в админ панель изменены.</p>
															<p>На данные момент ваше право доступа - '.$role.'</p>';
															$message .= ($role == 'admin') ? '<p>С правами доступа '.$role.' Вам доступна административная панель сайта </p>' : '<p>С правами доступа '.$role.' Вы не можете испльзовать административную панель сайта</p>';
													$message .= '
														</div>
														<div>
															<p style="font-size: 20px;">Для входа в административную панель сайта перейдите по <a href="http://'.$_SERVER['SERVER_NAME'].'/main/login">ссылке</a>.</p>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
										<hr>
										<div  width="100%" style="text-align: center;">Вы получили это письмо, так как зарегестрировались на сайте '.$_SERVER['SERVER_NAME'].'.Если Вы этого не делали то отпишитесь: напишите о проблеме нас по <a href="http://'.$_SERVER['SERVER_NAME'].'/#contact">ссылке</a> </div>
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