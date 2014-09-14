<?
// pic_bg.php
// recognizes picture as dark or light
// copyright 2014 brotheroftux
// this code is distributed under GPLv3 license

    $filename = $_GET['filename'];
    if (preg_match("/(\.jpe*g)$/i", $filename) != 0){
        $image = imagecreatefromjpeg($filename);
    }elseif (preg_match("/(\.png)$/i", $filename) != 0){
        $image = imagecreatefrompng($filename);
    }
    $width = imagesx($image);
    $height = imagesy($image);
    $pixel = imagecreatetruecolor(1, 1);
    imagecopyresampled($pixel, $image, 0, 0, 0, 0, 1, 1, $width, $height); // using default PHP GD function to resize image to 1x1 pixel pic -- it will be the average colour of the image
    $rgb = imagecolorat($pixel, 0, 0);
    $color = imagecolorsforindex($pixel, $rgb);
    $luminance = (0.2126*$color['red'] + 0.7152*$color['green'] + 0.0722*$color['blue']); // luminance formula, God bless wikipedia
    // echo $luminance; // now only for test
    if ($luminance <= 55){
        echo json_encode(array( "response" => "dark" ));
    }else{
        echo json_encode(array( "response" => "light" ));
    }
?>