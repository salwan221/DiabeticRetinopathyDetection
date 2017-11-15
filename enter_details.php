<?php

include ("database_connection_open.php");

	$name=$_POST["name"];
	$age=$_POST["age"];
	$mobile_no=$_POST["mobile_no"];
	$address=$_POST["address"];

	$query_enter_details="insert into patient_details (name,age,mobile_no,address) values ('".mysqli_escape_string($link,$name)."',".$age.",'".mysqli_escape_string($link,$mobile_no)."','".mysqli_escape_string($link,$address)."')";

	if($result=mysqli_query($link,$query_enter_details)){
		echo "Your Scan ID is :".(string)mysqli_insert_id($link);
	}

	else{
		echo "Unable to enter details. Please try again...";
	}

include ("database_connection_close.php");

?>
