<?php

//image table / id, title, uploader, uploader_id, description, date, tags

// CREATE TABLE images (
// 	   id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     title TINYTEXT NOT NULL,
//     uploader TINYTEXT NOT NULL,
//     uploader_id int(11) NOT NULL,
//     description LONGTEXT NOT NULL,
//     image_url LONGTEXT NOT NULL,
//     image_thumb LONGTEXT NOT NULL,
//     tags LONGTEXT NOT NULL,
//     date TIMESTAMP NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
// );

//Validate form submission, prevent user from navigating to script url without the form submission

session_start();

if (isset($_POST['submit']) && isset($_SESSION['uid']) && $_POST['key'] === '2NDvBgJ4pP2R9NzGWAbhiPYzx1UwQhtO') {

    include_once '../functions/helpers.php';
    require '../config/db.php';

    $image = $_FILES['image'];
    $title = $_POST['title'];
    $keys = $_POST['keywords'];
    $desc = $_POST['description'];

    $uploader = $_SESSION['uid'];
    $uploaderId = $_SESSION['id'];

    if(empty($title)) $title = 'Untitled';
    
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
                $dest = "uploads/$imgUploadName";
                move_uploaded_file($imgTmpName, "../$dest");

                //Generate thumbnail
                $thumbDest = "uploads/thumbs/thumb_$imgUploadName";
                create_thumbnail("../$dest", $extension, "../$thumbDest", 250, 250);

                //upload image info to the database table "images"
                $sql = 'INSERT INTO images (title, uploader, uploader_id, description, image_url, image_thumb, tags) VALUES (?, ?, ?, ?, ?, ?, ?);';
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location: ../upload.php?error=sqlerror');
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, 'ssissss', $title, $uploader, $uploaderId, $desc, $dest, $thumbDest, $keys);
                    mysqli_stmt_execute($stmt);
                    //CHANGE URL TO IMAGE UPLOAD ONCE IT'S COMPLETE
                    header('Location: ../upload.php?upload=success');
                    exit(); 
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            } else {
                header('Location: ../upload.php?error=imgsize');
                exit(); 
            }
        } else {
            header('Location: ../upload.php?error=imgerror');
            exit();
        }
    } else {
        header('Location: ../upload.php?error=invalidfile');
        exit();
    }

} else {
    header('Location: ../index/php');
    exit();
}