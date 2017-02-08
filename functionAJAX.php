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
		if ($_POST['set'] =='servis-del'|| $_POST['set'] =='servis-save') {
			if($_POST['set']){
				$idItem = $_POST['id'];
				$sql = "UPDATE settings_list SET glyphicon='{$_POST['glyphicon']}', title='{$_POST['title']}', article='{$_POST['article']}' WHERE id = $idItem";
				$res = insertUpdateDelete($sql);
				echo "Новые данные об услуге сохранены";
			}else{
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
				echo "Права пользователя сохранены";
			}else{
				$idItemDel = $_POST['id'];
				$sql = "DELETE FROM users WHERE id=$idItemDel";
				$res = insertUpdateDelete($sql);
				echo "Пользователь успешно удален из системы";
			}
		}
	}
}
?>