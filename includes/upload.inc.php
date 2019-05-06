<?php

//Validate form submission, prevent user from navigating to script url without the form submission
if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    
    $imgName = $image['name'];
    $imgTmpName = $image['tmp_name'];
    $imgSize = $image['size'];
    $imgError = $image['error'];
    $imgType = $image['type'];

    //Get file extension and verify it is a valid image type
    $imgExt = explode('.', $imgName);
    $extension = strtolower(end($imgExt));

    $allowableExt = ['jpg', 'gif', 'jpeg', 'png'];

    if (in_array($extension, $allowableExt)) {
        if ($imgError === 0) {
            if ($imgSize < 1500000) {

                //Generate unique name and store in uploads folder
                $imgUploadName = uniqid('', true) . ".$extension";
                $dest = "../uploads/$imgUploadName";
                move_uploaded_file($imgTmpName, $dest);
                header("Location: ../upload.php?upload=success");
                exit(); 
            } else {
                header("Location: ../upload.php?error=imgsize");
                exit(); 
            }
        } else {
            header("Location: ../upload.php?error=imgerror");
            exit();
        }
    } else {
        header("Location: ../upload.php?error=invalidfile");
        exit();
    }

} else {
    header("Location: ../index/php");
    exit();
}