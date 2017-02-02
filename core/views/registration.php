<?php require_once("/parts/_1.top_set.php") ?>
	<div class="container" id="form-controls">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
				<h1>REGISTRATION</h1>
				<form method="POST">
					<input type="text"
						name="login"
						value="<?= (isset($_POST['login'])) ? $_POST['login'] : ''?>"
						class="<?= (isset($formErrors['login'])) ? 'error' : ''?> form-control" placeholder="login"><br>

					<input type="password" name="password" class="form-control"><br>
					<input type="email" name="email"
						value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''?>"
						class="<?= (isset($formErrors['login'])) ? 'error' : ''?> form-control" placeholder="email"><br>
					<input type="text" name="phone"
						value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : ''?>"
						class="<?= (isset($formErrors['login'])) ? 'error' : ''?> form-control" placeholder="phone"><br>
					<textarea rows="10" cols="45" name="descript" class="form-control"></textarea>

					<?php if(isset($formErrors['login'])):?>
						<?php //var_dump($formErrors['login'])?>
					<?php endif; ?>

					<button class="form-control btn btn-success">Submit</button>
				</form>
			</div>
		</div>
	</div>
