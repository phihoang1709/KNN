<?php
session_start();
header('Content-type: image/png');

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$code = '';
for ($i = 0; $i < 4; $i++) {
    $code .= $characters[rand(0, strlen($characters) - 1)];
}

$_SESSION['captcha_code'] = $code;

$image = imagecreatetruecolor(120, 50);

$bg_color = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, 120, 50, $bg_color);

$text_color = imagecolorallocate($image, 0, 0, 0);

for ($i = 0; $i < 4; $i++) {
    $angle = rand(-30, 30);
    $x = $i * 30 + rand(5, 10);
    $y = rand(20, 30);
    imagettftext($image, 20, $angle, $x, $y, $text_color, 'arial.ttf', $code[$i]);
}

for ($i = 0; $i < 50; $i++) {
    $x = rand(0, 120);
    $y = rand(0, 50);
    imagesetpixel($image, $x, $y, $text_color);
}

for ($i = 0; $i < 3; $i++) {
    $x1 = rand(0, 120);
    $y1 = rand(0, 50);
    $x2 = rand(0, 120);
    $y2 = rand(0, 50);
    imageline($image, $x1, $y1, $x2, $y2, $text_color);
}

imagepng($image);
imagedestroy($image);
?>
