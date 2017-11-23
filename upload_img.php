<?php

if(array_key_exists("leftImg", $_FILES)){

    $target_dir = "uploads/".$patient_id."/";
    $target_file_name= $scan_id."_left.jpeg";
    $target_file = $target_dir . basename($target_file_name);
    $uploadOk = 1;


    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["leftImg"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already existss
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        die("Sorry, your file was not uploaded.");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["leftImg"]["tmp_name"], $target_file)) {
            $path_left=$target_dir.$target_file_name;
            // echo "The file ". basename( $_FILES["leftImg"]["name"]). " has been uploaded with error code : ".$_FILES["leftImg"]["error"];
        } else {
            // echo "Sorry, there was an error uploading your file ".basename( $_FILES["leftImg"]["name"])." with error code : ".$_FILES["leftImg"]["error"];
        }
    }

}else{

    die("error uploading files");

}

if(array_key_exists("rightImg", $_FILES)){

    $target_dir = "uploads/".$patient_id."/";
    $target_file_name= $scan_id."_right.jpeg";
    $target_file = $target_dir . basename($target_file_name);
    $uploadOk = 1;


    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["rightImg"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already existss
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        die("Sorry, your file was not uploaded.");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["rightImg"]["tmp_name"], $target_file)) {
            $path_right=$target_dir.$target_file_name;
            // echo "The file ". basename( $_FILES["rightImg"]["name"]). " has been uploaded with error code : ".$_FILES["rightImg"]["error"];
        } else {
            // echo "Sorry, there was an error uploading your file ".basename( $_FILES["rightImg"]["name"])." with error code : ".$_FILES["rightImg"]["error"];
        }
    }

}else{

    die("error uploading files");

}


?>
