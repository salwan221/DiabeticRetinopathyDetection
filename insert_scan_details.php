<?php

include ("database_connection_open.php");

$query="insert into scan_details (patient_id,scan_id,left_img_result,right_img_result) values (".$patient_id.",".$scan_id.",'no','no')";

if($result=mysqli_query($link,$query)){

	echo "new scan added";

}else{

	die("error adding scan");

}

include ("database_connection_close.php");

?>
