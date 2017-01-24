<?php 
	function show404(){
		header("HTTP/1.1 404 Not Found");
		//todo zamena
		echo '404 page';
	}
	function renderView($viewName, $formErrors){
		include 'core/views/'.$viewName.'.php';
	}
?>