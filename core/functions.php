<?php

	require_once("config.php");

//вывод страниц
function getPage(){
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
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

?>