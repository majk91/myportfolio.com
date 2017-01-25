<?php require_once("/parts/_1.top_set.php") ?>
	<h1>REG</h1>
	<form method="POST">
		<input type="text"
			name="login"
			value="<?= (isset($_POST['login'])) ? $_POST['login'] : ''?>"
			class="<?= (isset($formErrors['login'])) ? 'error' : ''?>" placeholder="login"><br>

		<input type="password" name="password"><br>
		<input type="email" name="email"
			value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''?>"
			class="<?= (isset($formErrors['login'])) ? 'error' : ''?>" placeholder="email"><br>
		<input type="text" name="phone"
			value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : ''?>"
			class="<?= (isset($formErrors['login'])) ? 'error' : ''?>" placeholder="phone"><br>
		<textarea rows="10" cols="45" name="descript"></textarea>

		<?php if(isset($formErrors['login'])):?>
			<?php //var_dump($formErrors['login'])?>
		<?php endif; ?>

		<button>Submit</button>
	</form>
