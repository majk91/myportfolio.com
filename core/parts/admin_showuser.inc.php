<?php 
		while($row = mysqli_fetch_assoc($res)) {
	    	if($row['id']!=$_SESSION['user']['id']){
				 $data	.='<div class="user-wrap">
			 	<div class="col-xs-2">
					<h5>Login:</h5>	
					<p>'.$row['login'].'</p>
				</div>
				<div class="col-xs-4">
					<label for="set_show_el">Права доступа:</label><br>
					<select id="set_show_el" name="set_show_el" class="form-control">
						<option disabled>Выбрать права</option>';
				if($row['role'] == 'admin'){
						$data.='<option value="admin" selected>admin</option>
						<option value="user">user</option>';
				}else{
					$data.='<option value="admin">admin</option>
						<option value="user" selected>user</option>';
				}
					$data.='</select>
				</div>
				<div class="col-xs-4 button-box">
					<div class="del hover-but" data-sql-id="'.$row['id'].'" data-check_mess="'.$row['id'].'"><p>Удалить пользователя из БД</p></div>
					<div class="save hover-but" data-sql-mail="'.$row['email'].'" data-check_mess="'.$row['id'].'"><p>Сохранить изменение прав</p></div>
				</div>
				<div class="col-xs-12"><hr></div>
			</div>';
	    	};
	    }; 
 ?>