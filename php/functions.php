<?php

require_once("config.php");

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
    // output data of each row
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
}



?>
