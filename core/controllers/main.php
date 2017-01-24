<?php 
	function action_index(){
		echo "index page";
	};
	function action_contacts(){
		echo "contact page";
	}
	function action_registration(){
		if($_SERVER['REQUEST_METHOD']== 'POST'){
			$formData = [
				'login' => htmlspecialchars(trim($_POST['login'])),
				'password' => trim($_POST['password']),
				'email' => trim($_POST['email'])
			];

			$rules = [
				'login' => ['required', 'login'],
				'password' => ['required', 'password'],
				'email' => ['required', 'email']
			];

			$errors = validateForm($rules, $formData);
			if(empty($errors)){
				//сохранить пользователя
			} 
		}
		renderView('registration', $errors);		
	}

?>