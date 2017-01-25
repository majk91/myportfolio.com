<?php 
	function show404(){
		header("HTTP/1.1 404 Not Found");
		//todo zamena
		echo '404 page';
	}
	function renderView($viewName, $formErrors){
		include 'core/views/'.$viewName.'.php';
	}

	function is_auth(){
		if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])){
			return true;
		}

		return false;
	}

?>