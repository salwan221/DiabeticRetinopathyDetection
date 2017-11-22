<?php

$path_left="/var/www/html/diabetic-retinopathy-detection/".$path_left;
$path_right="/var/www/html/diabetic-retinopathy-detection/".$path_right;

echo $path_left." ".$path_right;

$command1="cd classification_algorithm/inception_model/";
$command2="python2 -m scripts.label_image --graph=tf_files/retrained_graph.pb --image=".$path_left;
$command3="python2 -m scripts.label_image --graph=tf_files/retrained_graph.pb --image=".$path_right;

echo shell_exec($command1." && ".$command2);
echo shell_exec($command1." && ".$command3);

?>