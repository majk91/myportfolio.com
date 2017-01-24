<!DOCTYPE htm>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yurishinec Mike Portfolio</title>
</head>
<body>
	<h1>REG</h1>
		<form method="POST">
			<input type="text"
			name="login"
			value="<?= (isset($_POST['login'])) ? $_POST['login'] : ''?>"
			class="<?= (isset($formErrors['login'])) ? 'error' : ''?>">
			<?php if(isset($formErrors['login'])):?>
				<?php var_dump($formErrors['login'])?>
			<?php endif; ?>
			<button>Submit</button>
		</form>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<script src="../../js/Slider.js"></script>
	<script src="../../js/function.js"></script>
</body>
</html>