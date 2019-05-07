<?php

//Create thumbnail for uploaded image
//Thumbnail is used in index.php to display all recent and trending uploads
/**
* @param string $src Path for the image to be used for the thumbnail. 
* @param string $extension Image extension. 
* @param string $dest Thumbnail destination path for the created thumbnail. 
* @param int $w Thumbnail width.
* @param int $h Thumbnail height.
* @return bool Returns true if the thumbnail creation was successful. 
*/
function create_thumbnail($src, $extension, $dest, $w, $h) {
    list($imgWidth, $imgHeight) = getimagesize($src);
    $ratio = $imgWidth / $imgHeight;

    $allowableExt = ['jpg', 'gif', 'jpeg', 'png'];

    if (!in_array($extension, $allowableExt)) return false;

    //adjust target width and height to match image's ratio
    if ($w / $h > $ratio) {
        $w = $h * $ratio;
    } else {
        $h = $w / $ratio;
    }

    $thumb = null;
    switch($extension) {
        case "jpg":
            $thumb = imagecreatefromjpeg($src);
            break;
        case "jpeg":
            $thumb = imagecreatefromjpeg($src);
            break;
        case "gif":
            $thumb = imagecreatefromgif($src);
            break;
        case "png":
            $thumb = imagecreatefrompng($src);
            break;
        default:
            return false;
    }

    //resize thumb and save to file
    $trueColor = imagecreatetruecolor($w, $h);
    imagecopyresampled($trueColor, $thumb, 0, 0, 0, 0, $w, $h, $imgWidth, $imgHeight);
    imagejpeg($trueColor, $dest, 100);
    imagedestroy($trueColor);
    return true;
}