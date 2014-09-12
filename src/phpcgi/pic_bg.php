<?
// pic_bg.php
// recognizes picture as dark or light
// copyright 2014 brotheroftux
// this code is distributed under GPLv3 license

    $filename = $_GET['filename']; 
    $image = imagecreatefrompng($filename);
    $width = imagesx($image);
    $height = imagesy($image);
    $pixel = imagecreatetruecolor(1, 1);
    imagecopyresampled($pixel, $image, 0, 0, 0, 0, 1, 1, $width, $height); // using default PHP GD function to resize image to 1x1 pixel pic -- it will be the average colour of the image
    $rgb = imagecolorat($pixel, 0, 0);
    $color = imagecolorsforindex($pixel, $rgb);
    $colors['red']  = ($rgb >> 16) & 0xFF;
    $colors['green'] = ($rgb >> 8) & 0xFF;
    $blue['blue']  =  $rgb & 0xFF;
    $luminance = (0.2126*$colors['red'] + 0.7152*$colors['green'] + 0.0722*$colors['blue']); // luminance formula, God bless wikipedia
    echo $luminance; // now only for test
?>