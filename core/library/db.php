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

//вывод страниц
function getPage(){
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	//echo "Connected successfully";
	mysqli_set_charset($conn, "utf8");
	$sql = "SELECT * FROM site_parts";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			if($row['pp_number'] == 2){
	    		echo $row['text']."\n"."</div><!--.home-wraper-->";
		    }else{
		    	echo $row['text']."\n";
		    }
		}
	}else{
		echo "0 results";
	}

	mysqli_close($conn);
};
//вывод информации из БД
	function getSetInf($tabl, $rowItem){
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	mysqli_set_charset($conn, "utf8");

	$sql_counter= "SELECT COUNT($rowItem) FROM $tabl";
	$a = mysqli_query($conn, $sql_counter);
	$b = mysqli_fetch_array( $a, MYSQLI_NUM);
	$counter=$b[0];

	$sql = "SELECT $rowItem FROM $tabl";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			if($counter<=1){
				if($row["$rowItem"]){
					return $row["$rowItem"];
				}
			}else{
				$show="";
				if($row["$rowItem"]){
					$show .= "<p>$row[$rowItem]</p>"."\n";
				}
				echo $show;
			}
		}
	}else{
		echo "0 results";
	}

	mysqli_close($conn);
}

//отправка данных на сервер

function push_data(){
	echo "XXXXXXXXXXXX";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_FILES['set_favicon']['error'] == 0){
			$tmpName = $_FILES['set_favicon']['tmp_name'];

			if(move_uploaded_file($tmpName, 'file_upload/pic.jpg')){
				echo "file was saved";
			}
		}else{
			echo "error".$_FILES['set_favicon']['error'];
		}
		
	}
}

?>