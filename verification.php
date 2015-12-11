<?php
session_start();
$code_length = 4;
$image_args = array('width' => 100, 'height' => 60);

$str = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
for($i = 0; $i < $code_length; $i++) {
	$code .= $str[rand(0,61)];
}
$_SESSION["check"]=$code;

$image = imagecreate($image_args['width'], $image_args['height']);

$background = imagecolorallocate($image, 200, 200, 200);
$text = imagecolorallocate($image, 0, 0, 0);
$color1 = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
$color2 = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));

for($i = 0; $i < 300; $i++){
	imagesetpixel($image, 
		          rand(0,$image_args['width']), 
		          rand(0,$image_args['height']), 
		          $color1);
	}
for($i = 0; $i < 10; $i++){
	imageline($image, 
		      rand(0,60), rand(0,60), 
		      rand(0,100), rand(0,100), 
		      $color2);
}
	imagestring($image, 5, 25, 20, $code, $text);

	ob_clean();

	header('Cache-Control: private, max-age=0, no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);	
    header('Pragma: no-cache');
    header("content-type: image/png");
    imagepng($image);

    imagedestroy($image);
?>