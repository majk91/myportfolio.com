<?php require_once("parts/_1.top_set.php") ?>
	<div class="container" id="login-controls">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
				<form method="POST">
					<label for="login" class="control-label">Логин:</label>
					<p><input type="text" id="login" name="login" class="form-control" placeholder="login" data-rule ="required"></p>
					<label for="password" class="control-label">Пароль:</label>
					<p><input type="password" id="password" class="form-control" name="password" data-rule ="required"></p>
					<button class="btn btn-success">Вход</button>
				</form>
			</div>
		</div>
	</div>