<?php

include ("database_connection_open.php");

if(array_key_exists("patient_id",$_POST)){

	$patient_id=$_POST["patient_id"];

	$q="select * from patient_details where patient_id = ".$patient_id;

	if($r=mysqli_query($link,$q)){

		if(mysqli_num_rows($r)>0){

			$query="select * from scan_details where patient_id = ".$patient_id;

			if($result=mysqli_query($link,$query)){

				$rowcount=mysqli_num_rows($result);
				$scan_id=$rowcount+1;

				echo $scan_id;

			}else{

				die("error with query");

			}

		}else{

				die("patient id doesn't exist");

		}


	}else{

		die("error getting patient id");

	}


}else{

	die("error getting patient id");

}

include ("database_connection_close.php");

?>
