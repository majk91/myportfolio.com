<?php
	/**
	*Функция для подключения к БД
	*@return mysqli
	*/
	function connectToDb(){
		$config = require 'core/configs/db.php';

		$link = @mysqli_connect($config['host'], $config['user'], $config['password'], $config['db_name']);

		if(!$link){
			//вместо echo инклюдом подключить файлик в котором красивая картинка, надпись, текст
			echo "нужна страничка о том что нет доступа к базе данных! ";
			die();
		}
		return $link;
	}


	function selectData($sql){
		$link =connectToDb();
		$res = mysqli_query($link, $sql);

		if(!$res){
			die(mysqli_error($link));
		}
		return $res;
	}

	function insertUpdateDelete($sql){
		$link =connectToDb();
		$res = mysqli_query($link, $sql);

		if(!$res){
			die(mysqli_error($link));
		}
		return $res;
	}

	function getSaveData($str){
		$link = connectToDb();
		return mysqli_real_escape_string($link, $str);
	}

//отправка данных на сервер

function pushData(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['admin-main']=='admin-main'){
			imgData($_FILES['set_favicon'], 'favicon');
			imgData($_FILES['set_myPhoto'], 'myPhoto');
		}

	}
}
//перезапись Файлов в папках сервера
function imgData($input, $name){
	if($input['error'] == 0){
		$tmpName = $input['tmp_name'];
		if(move_uploaded_file($tmpName, 'file_upload/'.$name.".".pathinfo($input['name'])['extension'])){

			$filePuth = "file_upload/".$name.".".pathinfo($input[name])['extension'];
			pathToDb($input, $filePuth);
			echo "Данные успешно обновлены <br>";
		}
	}else{
		if($input['error'] == 4){
			echo "<br> Обратите внимание что картинка не была обновлена. ";
		}else{
			echo "Ошибка! Код ошибки: ".$input['error']."<br>";
		}
		
	}
}
//перезапись путей к файлам в БД
function pathToDb($input, $filePuth){
	if($filePuth=="file_upload/favicon.".pathinfo($input[name])['extension']){
		$sql = "UPDATE `main_settings` SET `favicon`='$filePuth' WHERE id = 2";
		$res = insertUpdateDelete($sql);
	}else{
		$sql = "UPDATE `main_settings` SET `my_photo`='$filePuth' WHERE id = 2";
		$res = insertUpdateDelete($sql);
	}
}

//перезапись полей в БД
function updateData(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['admin-main']){
			$formData = [
				'my_name_logo' => getSaveData(htmlspecialchars(trim($_POST['set_my_logo_name']))),
				'my_lastname_logo' => getSaveData(htmlspecialchars(trim($_POST['set_my_logo_lastname']))),
				'my_name' => getSaveData(htmlspecialchars(trim($_POST['set_name']))),
				'profession' => getSaveData(htmlspecialchars(trim($_POST['set_proffesion']))),
				'profession' => getSaveData(htmlspecialchars(trim($_POST['set_proffesion'])))
			];

			$str="";
			foreach ($formData as $key => $value){
				if(!$value==0){
					$str .=$changeRow.$key."='".$formData[$key]."', ";
				};
			};
			
			if(!$str) {
				echo "<br>Поля должны быть заполнены <br>";
				return folse;
			}
			$str = substr($str,0,-2);
			$sql = "UPDATE `main_settings` SET $str";
			$res = insertUpdateDelete($sql);
		}
		
	};
};
//запись телефонов в БД
function updateDataContact(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['admin-contacts']){
			$formData = [
				'phone1' => getSaveData(htmlspecialchars(trim($_POST['set_phone']))),
				'phone2' => getSaveData(htmlspecialchars(trim($_POST['set_phone0']))),
				'phone3' => getSaveData(htmlspecialchars(trim($_POST['set_phone1']))),
				'viber1' => getSaveData(htmlspecialchars(trim($_POST['set_viber']))),
				'viber2' => getSaveData(htmlspecialchars(trim($_POST['set_viber0']))),
				'viber3' => getSaveData(htmlspecialchars(trim($_POST['set_viber1']))),
				'skype1' => getSaveData(htmlspecialchars(trim($_POST['set_skype']))),
				'skype2' => getSaveData(htmlspecialchars(trim($_POST['set_skype0']))),
				'skype3' => getSaveData(htmlspecialchars(trim($_POST['set_skype1']))),
				'e_mail1' => getSaveData(htmlspecialchars(trim($_POST['set_email']))),
				'e_mail2' => getSaveData(htmlspecialchars(trim($_POST['set_email0']))),
				'e_mail3' => getSaveData(htmlspecialchars(trim($_POST['set_email1']))),
			];
			$count = '';
			foreach ($formData as $key => $value) {
				$count .=$value;
			}
			if($count==0){
				echo "Вы не ввели ни одного контакта";
				return folse;
			}

			$sql = "UPDATE `contacts` SET phone='{$formData['phone1']}', viber='{$formData['viber1']}', skype='{$formData['skype1']}', e_mail='{$formData['e_mail1']}'WHERE id=9";
			$sql1 = "UPDATE `contacts` SET phone='{$formData['phone2']}', viber='{$formData['viber2']}', skype='{$formData['skype2']}', e_mail='{$formData['e_mail2']}' WHERE id=10";
			$sql2 = "UPDATE `contacts` SET phone='{$formData['phone3']}', viber='{$formData['viber3']}', skype='{$formData['skype3']}', e_mail='{$formData['e_mail3']}' WHERE id=11";
			$res = insertUpdateDelete($sql);
			$res = insertUpdateDelete($sql1);
			$res = insertUpdateDelete($sql2);
		}
	}
}
//добавление данных для большого слайдера
function pushDataBigSlider(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['admin-myPortfilio']){
			$formData = [
				'name' => getSaveData(htmlspecialchars(trim($_POST['set_work_name']))),
				'category' => getSaveData(htmlspecialchars(trim($_POST['set_work_category']))),
				'customer' => getSaveData(htmlspecialchars(trim($_POST['set_client_name']))),
				'domen' => getSaveData(htmlspecialchars(trim($_POST['set_work_url'])))
			];
			if($_FILES['set_photo_big']['error']==0){
				$tmpName = $_FILES['set_photo_big']['tmp_name'];
				$newName = time().".".pathinfo($_FILES['set_photo_big']['name'])['extension'];
				if(move_uploaded_file($tmpName, 'file_upload/gallery_desctop/'.$newName)){
					$formData['big-photo']=$newName;
				}
			}
			if($_FILES['set_photo_smoll']['error']==0){
				$tmpName = $_FILES['set_photo_smoll']['tmp_name'];
				$newName = time().".".pathinfo($_FILES['set_photo_smoll']['name'])['extension'];
				if(move_uploaded_file($tmpName, 'file_upload/gallery_mobile/'.$newName)){
					$formData['smoll-photo']=$newName;
					echo "Данные отправлены!";
				}
			}
			$count = '';
			foreach ($formData as $key => $value) {
				$count .=$value;
			}
			if($count==0){
				echo "Поля не заполнены";
				return folse;
			}
			
			$sql = "INSERT INTO `gallery_settings`(`big-photo`, `smoll-photo`, `name`, `category`, `customer`, `domen`) VALUES ('{$formData['big-photo']}', '{$formData['smoll-photo']}', '{$formData['name']}', '{$formData['category']}', '{$formData['customer']}', '{$formData['domen']}')";

			$res = insertUpdateDelete($sql);
		}
	}
}
//Добавление данных о клиентах + отзывы
function pushClientsData(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['admin-myClients']){
			$formData = [
				'name_comp_logo' => getSaveData(htmlspecialchars(trim($_POST['set_clientComp_name']))),
				'name' => getSaveData(htmlspecialchars(trim($_POST['set_clientTtem_name']))),
				'position' => getSaveData(htmlspecialchars(trim($_POST['set_client_position']))),
				'company_name' => getSaveData(htmlspecialchars(trim($_POST['set_client_work']))),
				'review' => getSaveData(htmlspecialchars(trim($_POST['set_review']))),
			];
			if($_FILES['set_clientComp_logo']['error']==0){
				$tmpName = $_FILES['set_clientComp_logo']['tmp_name'];
				$newName = time().".".pathinfo($_FILES['set_clientComp_logo']['name'])['extension'];
				if(move_uploaded_file($tmpName, 'file_upload/client_logo/'.$newName)){
					$formData['photo_logo']=$newName;
				}
			}
			$count="";
			foreach ($formData as $key => $value) {
				$count .=$value;
			}
			if(!$count){
				echo "Поля не заполнены";
				return folse;
			}
			
			$sql = "INSERT INTO `clients_reviews`(`name`, `position`, `company_name`, `review`) VALUES ('{$formData['name']}', '{$formData['position']}', '{$formData['company_name']}', '{$formData['review']}')";

			$sql1 = "INSERT INTO `clients_logo`(`name`, `photo_logo`) VALUES ('{$formData['name_comp_logo']}', '{$formData['photo_logo']}')";

			$res = insertUpdateDelete($sql);
			$res = insertUpdateDelete($sql1);
		}
	}
}
function selectItem($tabl, $col){
	$sql = "SELECT * FROM $tabl ";
	$res = selectData($sql);

	if (mysqli_num_rows($res) > 0) {
	    while($row = mysqli_fetch_assoc($res)) {
	        return $row["$col"];
	    }
	} else {
	    echo "0 results";
	}
}
function selectContact(){
	$sql = "SELECT * FROM contacts ";
	$res = selectData($sql);
	$phone=[];
	$viber=[];
	$skype=[];
	$email=[];
	if (mysqli_num_rows($res) > 0) {
	    while($row = mysqli_fetch_assoc($res)) {
	    	if($row["phone"]!=0){
	    		$phone[]=$row["phone"];
	    	};
	    	if($row["viber"]!=0){
	    		$viber[]=$row["viber"];
	    	};
	    	if($row["skype"]!=''){
	    		$skype[1]=$row["skype"];
	    	};
	    	if($row["e_mail"]!=''){
	    		$email[1]=$row["e_mail"];
	    	};
	    	
	    }
	    $result="";
	    foreach ($phone as $key => $value) {
	    	$result.="<div class='phone-box'><span class='glyphicon glyphicon-earphone'></span><p>".$value."</p></div>";
	    };
		foreach ($viber as $key => $value) {
	    	$result.="<div class='viber-box'><span class='viber'></span><p>".$value."</p></div>";
	    };
		foreach ($skype as $key => $value) {
	    	$result.="<div class='skype-box'><span class='skype'></span><p>".$value."</p></div>";
	    };
		foreach ($email as $key => $value) {
	    	$result.="<div class='mail-box'><span class='glyphicon glyphicon-envelope'></span><p>".$value."</p></div>";
	    };
	        return $result;
	} else {
	    echo "0 results";
	}
};
function getClient(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['send-btn']){
			$formData = [
				'name' => getSaveData(htmlspecialchars(trim($_POST['name']))),
				'tel' => getSaveData(htmlspecialchars(trim($_POST['tel']))),
				'email' => getSaveData(htmlspecialchars(trim($_POST['email']))),
				'massege' => getSaveData(htmlspecialchars(trim($_POST['massege'])))
			];
			foreach ($formData as $key => $value) {
				$data.=$value;
			}
			if($data){
				$sql = "INSERT INTO `lid`(name, phone, email, comment) VALUES ('{$formData['name']}', '{$formData['tel']}', '{$formData['email']}', '{$formData['massege']}')";

				$res = insertUpdateDelete($sql);
				echo " Спасибо за ваш вопрос! С Вами свяжуться в ближайшее время";
			}else{
				echo "Поля должны быть заполнены!";
			}
		}
	}
}
function selectMassege(){

	$sql = "SELECT * FROM lid ";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
    	while($row = mysqli_fetch_assoc($res)) {
        	echo $row["time"]."<br>У Нас новый клиент<br> Имя: " . $row["name"]. "<br> Телефон: " . $row["phone"]."<br> Email: " . $row["email"]."<br> Сообщение: " . $row["email"]."<br>";
        }
    }
}
function selectCounter(){
	$sql = "SELECT * FROM lid ";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
        $i=0;
    	while($row = mysqli_fetch_assoc($res)) {
    		$i++;
        }
        echo $i;
    }
}
function showMenyFunctions(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	echo '<div id="massege-box" title="Системное сообщение"><p>';
	pushData();
	updateData();
	updateDataContact();
	pushDataBigSlider();
	pushClientsData();
	echo "</p></div>";
	}
}

?>