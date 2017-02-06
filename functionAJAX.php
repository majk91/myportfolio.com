<?php 
require 'core/configs/main.php';
require 'core/library/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_POST['set']){
		$idItem = $_POST['id'];
		$sql = "UPDATE `lid` SET `checking`='0' WHERE id = $idItem";
		$res = insertUpdateDelete($sql);
		echo "Данные о клиенте успешно обработаны и сохранены";
	}else{
		$idItemDel = $_POST['id'];
		$sql = "DELETE FROM lid WHERE id=$idItemDel";
		$res = insertUpdateDelete($sql);
		echo "Данные о клиенте успешно удалены";
	}
}
?>