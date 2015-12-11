<?php
$type = $_FILES["file"]["type"];
$name = $_FILES["file"]["name"];
$size = $_FILES["file"]["size"];
$tmp = $_FILES["file"]["tmp_name"];
$error = $_FILES["file"]["error"];
$small = "small/".$_FILES["file"]["name"];
$Name = "image_jpg/".$name;
$width=100;
$height=100;
session_start(); 
if(isset($_POST["check1"])) {
  if($_POST["check1"] != $_SESSION["check"])
 		echo "<script>history.go(-1);</script>"; 
}
if((($type == "image/gif")||($type == "image/jpeg")||($type == "image/png") || ($type == "image/jpg"))&&($size<200000000000)) {
	if($error > 0) {
		echo "Upload failed";
	} else {
	  if((file_exists("image_jpg/".$name))||(file_exists("image_gif/".$name))||(file_exists("image_png/".$name))) {
		echo "Already exists";
		} else {
		  if($type == "image/gif") {
		  	move_uploaded_file($tmp , "image_gif/".$name);
		  	$src_image = ImageCreateFromGIF("image_gif/".$name);
		  	$w = imagesx($src_image);
		  	$h = imagesy($src_image);
		  	$new_image = imagecreatetruecolor($w, $h);
		  	imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $width, $height, $w, $h);
		  	header('Content-type: image/gif');
		  	imagegif($new_image);
		  }
		  if($type == "image/jpeg") {
		  	move_uploaded_file($tmp , "image_jpg/".$name);
		  	$src_image = ImageCreateFromJPEG("image_jpg/".$name);
		  	$w = imagesx($src_image);
		  	$h = imagesy($src_image);
		  	$new_image = imagecreatetruecolor($w, $h);
		  	imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $width, $height, $w, $h);
		  	ob_clean();
		  	header('Content-type: image/jpeg');
		  	imagejpeg($new_image);
		  }
		  if($type == "image/png") {
		  	move_uploaded_file($tmp , "image_png/".$name);
		  	$src_image = ImageCreateFromPNG("image_png/".$name);
		  	$w = imagesx($src_image);
		  	$h = imagesy($src_image);
		  	$new_image = imagecreatetruecolor($w, $h);
		  	imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $width, $height, $w, $h);
		  	header('Content-type: image/png');
		  	imagepng($new_image);
		  }
		}
	}
}

else echo "Invalid file";
?>