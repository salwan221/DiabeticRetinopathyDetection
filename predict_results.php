<?php

include_once ("database_connection_open.php");

$path_left="/var/www/html/diabetic-retinopathy-detection/".$path_left;
$path_right="/var/www/html/diabetic-retinopathy-detection/".$path_right;

// echo $path_left." ".$path_right;

$command1="cd classification_algorithm/inception_model/";
$command2="python2 -m scripts.label_image --graph=tf_files/retrained_graph.pb --image=".$path_left;
$command3="python2 -m scripts.label_image --graph=tf_files/retrained_graph.pb --image=".$path_right;

$left = shell_exec($command1." && ".$command2);
$right = shell_exec($command1." && ".$command3);

$left_final = explode(';',$left);
$right_final = explode(';',$right);
$returned = ""; 

$left_rest="";
$right_res="";

for($i = 0; $i < sizeof($left_final) - 1; $i++){
	$str = explode(',',$left_final[$i]);
	$returned = $returned."<tr>";
	$returned .= "<td> Left_Eye </td>";


	for($j = 0; $j < sizeof($str); $j++){
		$returned .= "<td>".(string)$str[$j]."</td>";

		if($i==0 && $j==1){
			$left_res=$str[$j];
		}

	}


	$returned = $returned."</tr>";
}

for($i = 0; $i < sizeof($right_final) - 1; $i++){
	$str = explode(',',$right_final[$i]);
	$returned = $returned."<tr>";
	$returned .= "<td> Right_Eye </td>";
	for($j = 0; $j < sizeof($str); $j++){
		$returned .= "<td>".(string)$str[$j]."</td>";

		if($i==0 && $j==1){
			$right_res=$str[$j];
		}

	}

	$returned = $returned."</tr>";
}

$query="insert into scan_details values (".$patient_id.",".$scan_id.",'".mysqli_escape_string($link,$left_res)."','".mysqli_escape_string($link,$right_res)."')";
// print($query);

if($result=mysqli_query($link,$query)){

	// echo "new scan added";

}else{

	die("error adding scan");

}

 print($returned);

 include_once("database_connection_close.php");

?>