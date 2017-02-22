<?php 
	function show404(){
		header("HTTP/1.1 404 Not Found");
		//todo zamena
		require_once("/parts/_1.top_set.php");
		echo '<?php //require_once("/parts/_1.top_set.php") ?>
	<div class="container">
		<div class="row" style="height: 60vh">
			<div class="col-xs-12" style="text-align: center;">
				<h1 style="margin: 70px;">Ошибка 404. Страница не найдена!</h1>
				<a href="/" style="margin: 0 auto; display: table; width: 30%; height: 50px; border-radius: 5px; background-color: #82E417; line-height: 50px; color: #FFFFFF; font-size: 1.5em; text-decoration: none;">Перейти на главную</a>
			</div>
		</div>
	</div>';
require_once("/parts/_9footer.php");
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