<?php

function showMenyFunctions(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	echo '<div id="massege-box" title="Системное сообщение"><p>';
	pushData();
	updateData();
	updateDataContact();
	pushDataBigSlider();
	pushClientsData();
	updateServisItem();
	newServis();
	echo "</p></div>";
	}
}
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
			$count = "";
			foreach ($formData as $key => $value) {
				$count .=$value;
			}
				//var_dump($formData);
			if($count==""){
				echo "Поля не заполнены";
				return folse;
			}
			
			$sql = "INSERT INTO `gallery_settings`(`big_photo`, `smoll_photo`, `name`, `category`, `customer`, `domen`) VALUES ('{$formData['big-photo']}', '{$formData['smoll-photo']}', '{$formData['name']}', '{$formData['category']}', '{$formData['customer']}', '{$formData['domen']}')";

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
	$sql = "SELECT * FROM $tabl";
	$res = selectData($sql);

	if (mysqli_num_rows($res) > 0) {
	    while($row = mysqli_fetch_assoc($res)) {
	        return $row["$col"];
	    }
	} else {
	    echo "0 results";
	}
}
function selectContactAdmin(){
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
	    $result.="<div class='col-xs-6'><h5>Телефон:</h5>";
	    foreach ($phone as $key => $value) {
	    	$result.="<p>".$value."</p>";
	    };
	    $result.="</div>";
	    $result.="<div class='col-xs-6'><h5>Viber:</h5>";
		foreach ($viber as $key => $value) {
			$result.="<p>".$value."</p>";
	    };
	    $result.="</div>";
	    $result.="<div class='col-xs-6'><h5>Skype:</h5>";
		foreach ($skype as $key => $value) {
	    	$result.="<p>".$value."</p>";
	    };
	    $result.="</div>";
	    $result.="<div class='col-xs-6'><h5>Email:</h5>";
		foreach ($email as $key => $value) {
	    	$result.="<p>".$value."</p>";
	    };
	    $result.="</div>";
	        return $result;
	} else {
	    echo "";
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
	    	$result.="<div class='phone-box'><span class='glyphicon glyphicon-earphone'></span><p><noindex><a rel='nofollow' href='tel:".$value."'>".$value."</a></noindex></p></div>";
	    };
		foreach ($viber as $key => $value) {
			$result.="<div class='viber-box'><span class='viber'></span><p><noindex><a rel='nofollow' href='tel:".$value."'>".$value."</a></noindex></p></div>";
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
				echo " Спасибо за ваш запрос! С Вами свяжуться в ближайшее время";
				$sql = "SELECT * FROM users ";
				$res = selectData($sql);
			    $i=0;
				while($row = mysqli_fetch_assoc($res)) {
			    	if($row["email"]!=""){
						$i++;
			    	};
			    };
				if (mysqli_num_rows($res) > 0) {
					$admin_email = "";
					$sql = "SELECT * FROM users ";
					$res = selectData($sql);
		   			while($row = mysqli_fetch_assoc($res)) {
		    			$admin_email.=$row["email"];
		   				if($i>0){
		   					$admin_email.=", ";
		   				}
		    			$i--;
		   					
		    		}
		    	}
				sendEmail($admin_email, $formData['name'], $formData['tel'], $formData['email'], $formData['massege']);
			}else{
				echo "Поля должны быть заполнены!";
			}
	    	
	    }
	}
}
function selectMessege(){
	$sql = "SELECT * FROM lid ";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
    	while($row = mysqli_fetch_assoc($res)) {
    		if($row["checking"]){
    			include '/core/parts/admin_showmassege.inc.php';
    		}
        }
    }
}
function showCounter(){
	$sql = "SELECT * FROM lid WHERE checking != 0 ";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
        $i=0;
    	while($row = mysqli_fetch_assoc($res)) {
    		$i++;
        }
        echo $i;
    }else echo "0";
}
function sendEmailUser($idItem, $role){
	$sql = "SELECT * FROM users WHERE id=$idItem";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)) {
	    	$login = $row["login"];
	    	$email = $row["email"];
	    	$role = $row["role"];
        }
    }
	$subject = $_SERVER['SERVER_NAME'].' || Вы получили новое сообщение об изменении прав';

	include '/core/parts/email_newclient.inc.php';

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	mail($email, $subject, $message, $headers);
	return folse;
};

function sendEmail($to, $name, $phone, $email, $mess){
	$subject = $_SERVER['SERVER_NAME'].' || Вы получили новое сообщение из формы';

	include '/core/parts/email_newclient.inc.php';
	
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	mail($to, $subject, $message, $headers);
	return folse;
}
//Вывод галлереи работ на главной
//Функция возвращает массив путей к файлам
function selectPic($row_name, $row_url){
	$sql = "SELECT * FROM gallery_settings";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
		$data = [];
	    while($row = mysqli_fetch_assoc($res)) {
	    	if($row[$row_name]!=""){
	    		$data[]= [
	    			"url" => $row[$row_url],
	    			"path" => $row[$row_name]
	    		];
	    	};    	
	    };
	}
	return $data;
}
//значение $set отвечает за вывод мобильной или нет версии. При $set= 0 -  вывод мобильной версии
function showPictures($row_name, $row_url, $set){
		$data = selectPic($row_name, $row_url);
		if($set){
			$i=0;
			$print="";

			include '/core/parts/pictures_big.inc.php';
			
			return $print;
		}else{
			$i=0;
			$print="";

			include '/core/parts/pictures_smoll.inc.php';

			return $print;
		};
}
function getIndicators(){
	$dir = opendir('file_upload/gallery_desctop');
	$count = 0;
	while($file = readdir($dir)){
	    if($file == '.' || $file == '..' || is_dir('path/to/dir' . $file)){
	        continue;
	    }
	    $count++;
	}
	$i = intval($count/9);
	$j = 0;
	while ( $j <= $i) {
		if($j){
			echo '<li data-target="#carousel-example-generic" data-slide-to="'.$j.'"></li>';
		}else{
			echo '<li data-target="#carousel-example-generic" data-slide-to="'.$j.'" class="active"></li>';
		}
		$j++;					
	}
}
function showUsers(){
	$sql = "SELECT * FROM users";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
		$data = '';
  			include '/core/parts/admin_showuser.inc.php';
	}
	return $data;
}
function showServisaAdmin(){
	$sql = "SELECT * FROM settings_list";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
		$data = '';
	    while($row = mysqli_fetch_assoc($res)) {
	    	$data .='<div class="articles-wrap">
				 		<div class="col-xs-2">
							<h5>Glyphicon:</h5><span class="glyphicon '.$row['glyphicon'].'"></span>
						</div>
						<div class="col-xs-2">
							<h5>Название:</h5>	
							<p class="admin-article-title">'.$row['title'].'</p>
						</div>
						<div class="col-xs-8">
							<h5>Статья:</h5>	
							<p class="admin-article-text">'.$row['article'].'</p>
						</div>
						<div class="col-xs-12 button-box">
							<div class="row">
								<div class="col-xs-6">
									<div class="servis-del hover-but" data-check_mess="'.$row['id'].'"><p> Удалить статью из БД</p></div>
								</div>
								<div class="col-xs-6">
									<div class="servis-save hover-but" data-check_mess="'.$row['id'].'"><p>Редактировать и сохранить</p></div>
								</div>
							</div>
						</div>
						<div class="col-xs-12"><hr></div>
					</div>';
	    }
	    return $data;
	}
}
function showClientsAdmin(){
	$sql = "SELECT * FROM clients_logo";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
		$data = '';
	    while($row = mysqli_fetch_assoc($res)) {
	    	$data .='<div class="col-xs-6">
						<p>Назваие компании:</p>
						<p>'.$row['name'].'</p>
                	</div>
                	<div class="col-xs-6">
						<p>Логотип:</p>
						<div class="img-client">
							<img src="/file_upload/client_logo/'.$row['photo_logo'].'" alt="'.$row['name'].'">
						</div>
                	</div>
                	<div class="col-xs-12 button-box">
						<div class="row">
							<div class="col-xs-6">
								<div class="del hover-but" data-check_mess="'.$row['id'].'"><p> Удалить данные</p></div>
							</div>
							<div class="col-xs-6">
								<div class="save hover-but" data-check_mess="'.$row['id'].'"><p>Редактировать данные</p></div>
							</div>
						</div>
					</div>
                	<div class="col-xs-12"><hr></div>';
	    }
	    return $data;
	}
}


function updateServisItem(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['send-settings']){
			$formData = [
				'glificon' => getSaveData(htmlspecialchars(trim($_POST['set_glificon-update']))),
				'servis_title' => getSaveData(htmlspecialchars(trim($_POST['set_servis_item-update']))),
				'servis_text' => getSaveData(htmlspecialchars(trim($_POST['set_servis_text-update']))),
				'id_item' => $_POST['id-item']
			];

			$count = '';
			foreach ($formData as $key => $value) {
				$count .=$value;
			}
			if($count==''){
				echo 'Поля должны быть заполнены!';
				return folse;
			}else{
				echo 'Изменения сохранены!';
			}
			$sql = "UPDATE `settings_list` SET glyphicon='{$formData['glificon']}', title='{$formData['servis_title']}', article='{$formData['servis_text']}' WHERE id='{$formData['id_item']}' ";
			$res = insertUpdateDelete($sql);
		}
	}
}
function newServis(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['send-set-item']){
			$formData = [
				'glificon' => getSaveData(htmlspecialchars(trim($_POST['set_glificon']))),
				'title' => getSaveData(htmlspecialchars(trim($_POST['set_servis_item']))),
				'text' => getSaveData(htmlspecialchars(trim($_POST['set_servis_text']))),
			];

			$count = '';
			foreach ($formData as $key => $value) {
				$count .=$value;
			}
			if($count==''){
				echo 'Поля должны быть заполнены!';
				return folse;
			}else{
				echo 'Новый сервис добавлен!';
			}
			$sql = "INSERT INTO settings_list (glyphicon, title, article) VALUES ('{$formData['glificon']}', '{$formData['title']}', '{$formData['text']}')";
			$res = insertUpdateDelete($sql);
		}
	}
}
function showServises(){
	$sql = "SELECT * FROM settings_list";
	$res = selectData($sql);
	if (mysqli_num_rows($res) > 0) {
		$data = "";
	    while($row = mysqli_fetch_assoc($res)) {
	    	$data .= '<div class="servis-item">
        	     <div class="item-wraper">
        	         <div class="item-logo"><span class="glyphicon '.$row['glyphicon'].'"></span></div>
        	         <div class="item-title">
        	         	<div class="item-title-box">'.$row['title'].'</div>
        	         </div>
        	         <div class="item-text">'.$row['article'].'</div>
        	     </div>
        	 </div>';
        }
    }
    return $data ;
}
function showWorksAdmin(){
	$sql = "SELECT * FROM gallery_settings";
	$res = selectData($sql);
	$i=1;
	$j=1;
	$data = "";
	$data .= '<div id="page-'.$j.'" class="active">';
	if (mysqli_num_rows($res) > 0) {
	    while($row = mysqli_fetch_assoc($res)) {
	    	if($i%12){
				$data .= '<div class="wrap">
					<img src="../file_upload/gallery_desctop/'.$row['big_photo'].'" alt="'.$row['name'].'">
					<div class="trash" data-check_mess="100000"></div>
					<div class="magnifier" data-target="message'.($i-1).'"></div>
				</div>
				<div id="dialog-message'.($i-1).'" class="hid" title="'.$row['name'].'">
					<div class="dialog-box">
						<div class="dialog-image-big">
							<img src="../file_upload/gallery_desctop/'.$row['big_photo'].'" alt="'.$row['name'].'">
						</div>
						<div class="dialog-image-smoll">
							<img src="../file_upload/gallery_mobile/'.$row['smoll_photo'].'?>" alt="'.$row['name'].'">
						</div>
						<a href="'.$row['domen'].'">Перейти на сайт</a>
					</div>
					<p>
						<span>Заказчик: '.$row['customer'].'</span><br>
						<span>Категория: '.$row['category'].'</span>
					</p>
				</div>';

	    	}else{
	    		$j++;
				$data .= '<div class="wrap">
					<img src="../file_upload/gallery_desctop/'.$row['big_photo'].'" alt="'.$row['name'].'">
					<div class="trash" data-check_mess="100000"></div>
					<div class="magnifier" data-target="message'.($i-1).'"></div>
				</div>
				<div id="dialog-message'.($i-1).'" class="hid" title="'.$row['name'].'">
					<div class="dialog-box">
						<div class="dialog-image-big">
							<img src="../file_upload/gallery_desctop/'.$row['big_photo'].'" alt="'.$row['name'].'">
						</div>
						<div class="dialog-image-smoll">
							<img src="../file_upload/gallery_mobile/'.$row['smoll_photo'].'?>" alt="'.$row['name'].'">
						</div>
						<a href="'.$row['domen'].'">Перейти на сайт</a>
					</div>
					<p>
						<span>Заказчик: '.$row['customer'].'</span><br>
						<span>Категория: '.$row['category'].'</span>
					</p>
				</div>';
			$data .='<div id="page-'.$j.'">';
			$i++;
	    	}
	    }
	}
	$data .='</div>';
	return $data;   	
}
function showWorksPagination(){
	$sql = "SELECT * FROM gallery_settings";
	$res = selectData($sql);
	$i=1;
	$j=1;
	if (mysqli_num_rows($res) > 0) {
		$data = '<ul id="pagination" class="pagination">
					<li><a href="#" data-target="first">&laquo;</a></li>
					<li class="active"><a href="#" rel="page-1">1</a></li>';
	    while($row = mysqli_fetch_assoc($res)) {
	    	if(!$i%12){
	    		$j++;
				$data .= '<li><a href="#" rel="page-'.$j.'">'.$j.'</a></li>';
	    	}
	    }
		$data .= '	<li><a href="#" data-target="last">&raquo;</a></li>
	   			</ul>';
		return $data;   	
	}  
}
?>