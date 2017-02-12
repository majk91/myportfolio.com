<?php 
require 'core/configs/main.php';
require 'core/library/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_POST['idModal']=='#messeges-show-modal'){
		if($_POST['set']){
			$idItem = $_POST['id'];
			$sql = "UPDATE lid SET checking ='0' WHERE id = $idItem";
			$res = insertUpdateDelete($sql);
			echo "Данные о клиенте успешно обработаны и сохранены";
		}else{
			$idItemDel = $_POST['id'];
			$sql = "DELETE FROM lid WHERE id=$idItemDel";
			$res = insertUpdateDelete($sql);
			echo "Данные о клиенте успешно удалены";
		}
	}else if($_POST['idModal']=='#settings-show-modal'){
		if ($_POST['param'] =='servis-del'|| $_POST['param'] =='servis-save') {
			if(!$_POST['set']){
				$idItemDel = $_POST['id'];
				$sql = "DELETE FROM settings_list WHERE id=$idItemDel";
				$res = insertUpdateDelete($sql);
				echo "Статья успешно удалена";
			}
		}else{
			if($_POST['set']){
				$idItem = $_POST['id'];
				$sql = "UPDATE users SET role='{$_POST['param']}' WHERE id = $idItem";
				$res = insertUpdateDelete($sql);
				sendEmailUser($idItem, $_POST['param']);
				echo "Права пользователя сохранены";
			}else{
				$idItemDel = $_POST['id'];
				$sql = "DELETE FROM users WHERE id=$idItemDel";
				$res = insertUpdateDelete($sql);
				echo "Пользователь успешно удален из системы";
			}
		}
	}else if($_POST['idModal']=='#main-content-show-modal'){
		$idItem = $_POST['id'];
		$sql = "DELETE FROM gallery_settings WHERE id=$idItem";
		$res = insertUpdateDelete($sql);
		echo "Работа удалена из галереи";
	}else if($_POST['idModal']=='#slider-show-modal'){
		$thisItem1 = $_POST['thisItem'][0]+$_POST['thisItem'][1]+$_POST['thisItem'][2];
		if($thisItem1=='del'){
			$idItem = $_POST['id'];
			$sql = "DELETE FROM clients_logo WHERE id=$idItem";
			$res = insertUpdateDelete($sql);
			echo "Клиент удален из Базы";
		}else{
			$idItem = $_POST['id'];
			$sql = "DELETE FROM clients_reviews WHERE id=$idItem";
			$res = insertUpdateDelete($sql);
			echo "Отзыв клиента удален";
		}
	}
}
?>