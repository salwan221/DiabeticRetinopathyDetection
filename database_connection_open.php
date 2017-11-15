<?php


$host="localhost";
$user="root";
$password="root";
$database="diabetic_retinopathy_detection";

$link=mysqli_connect($host,$user,$password,$database);

if(mysqli_connect_errno()){
    die("database connection failed");
}	

?>
