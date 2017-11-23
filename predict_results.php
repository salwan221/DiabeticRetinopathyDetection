<?php

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

// print_r($left_final);

for($i = 0; $i < sizeof($left_final) - 1; $i++){
	$str = explode(',',$left_final[$i]);
	$returned = $returned."<tr>";
	$returned .= "<td> Left_Eye </td>";
	for($j = 0; $j < sizeof($str); $j++){
		$returned .= "<td>".(string)$str[$j]."</td>";
	}

	$returned = $returned."</tr>";
}

for($i = 0; $i < sizeof($right_final) - 1; $i++){
	$str = explode(',',$right_final[$i]);
	$returned = $returned."<tr>";
	$returned .= "<td> Right_Eye </td>";
	for($j = 0; $j < sizeof($str); $j++){
		$returned .= "<td>".(string)$str[$j]."</td>";
	}

	$returned = $returned."</tr>";
}

 print($returned);
?>