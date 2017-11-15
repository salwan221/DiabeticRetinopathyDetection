<?php
	
	include_once("database_connection_open.php");

	$sql = "SELECT e.patient_id, e.name, e.age, e.mobile_no, e.address, s.scan_id, s.left_img_result, s.right_img_result from patient_details e, scan_details s where e.patient_id = s.patient_id";
	
	$result = mysqli_query($link, $sql);
	$str = "";
	while($row = mysqli_fetch_row($result)){
		$str = $str."<tr>";
		for($i = 0; $i < sizeof($row);$i++)
			$str = $str."<td>".$row[$i]."</td>";
		
		$str = $str."</tr>";
	}
	echo $str;
	include_once("database_connection_close.php");
?>
