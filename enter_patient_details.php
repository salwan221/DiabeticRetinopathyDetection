<?php

include ("database_connection_open.php");

if(array_key_exists("name",$_POST) && array_key_exists("age",$_POST) && array_key_exists("mobile_no",$_POST) && array_key_exists("address", $_POST)){

	$name=$_POST["name"];
	$age=$_POST["age"];
	$mobile_no=$_POST["mobile_no"];
	$address=$_POST["address"];

	$query_enter_details="insert into patient_details (name,age,mobile_no,address) values ('".mysqli_escape_string($link,$name)."',".$age.",'".mysqli_escape_string($link,$mobile_no)."','".mysqli_escape_string($link,$address)."')";

	if($result=mysqli_query($link,$query_enter_details)){

		echo "1";

	}else{

		echo "2";

	}


}else{

	echo "form data not received";

}

include ("database_connection_close.php");

?>