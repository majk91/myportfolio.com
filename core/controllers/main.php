<?php 
	function action_index(){
		renderView('index', []);
	};
	function action_contacts(){
		echo "contact page";
	}
	function action_registration(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$formData = [
				'login' => getSaveData(htmlspecialchars(trim($_POST['login']))),
				'password' => getSaveData(trim($_POST['password'])),
				'email' => getSaveData(trim($_POST['email'])),
				'phone' => getSaveData(trim($_POST['phone'])),
				'descript' => getSaveData(htmlspecialchars(trim($_POST['descript'])))
			];

			$rules = [
				'login' => ['required', 'login'],
				'password' => ['required', 'password'],
				'email' => ['required', 'email'],
				'phone' => ['required', 'phone'],
				'descript' => ['required', 'descript']
			];
			$errors = validateForm($rules, $formData);
			if(empty($errors)){

				$formData['password'] = md5($formData['password'].SECRET_KEY);
				$sql = "INSERT INTO `users`(`login`, `pass`, `email`, `phone`, `descript`) VALUES ('{$formData['login']}', '{$formData['password']}', '{$formData['email']}', '{$formData['phone']}', '{$formData['descript']}')";
				
				$sqli = "SELECT id FROM users WHERE login='{$formData['login']}' or email='{$formData['email']}' or phone='{$formData['phone']}'";
				$res = selectData($sqli);

				if($res->num_rows === 0){
					if(insertUpdateDelete($sql)){
						header("Location: /main/successReg");
					}
				}else{
					echo "Вы ввели не уникальные персональные данные";
				}

			} 
		}
		renderView('registration', $errors);		
	}
	function action_admin(){
		if(is_auth()){
			pushData();
			updateData();
			updateDataContact();
			pushDataBigSlider();
			pushClientsData();
			renderView('admin', []);	
		}else{
			echo "Hello guest";
		}
	}
	function action_successReg(){
		echo "Поздравляем! Вы успешно зарегестрировались! <br>Ожидайте, после проверки модератором Вам будет предоставлен доступ в административную панель, о чем Вас проинформируют сообщением";
	}
	function action_login(){
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$formData = [
				'login' => getSaveData(htmlspecialchars(trim($_POST['login']))),
				'password' => getSaveData(trim($_POST['password']))
			];
			$formData['password'] = md5($formData['password'].SECRET_KEY);

			//$roleAdmin='admin';

			$sql = "SELECT id FROM users WHERE login='{$formData['login']}' and pass='{$formData['password']}' and role='admin'";

			$res = selectData($sql);

			if($res->num_rows === 0){
				echo 'Не верний Логин или Пароль для администратора!';
			}else{
				$_SESSION['user'] = mysqli_fetch_assoc($res);
				header('Location: /main/admin');
			}
		}
		renderView('login', []);
	}
	function action_loguot(){
		session_unset();
		session_destroy();
		header('Location: /');
	};

?>