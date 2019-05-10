<?php
session_start();

include_once '../functions/helpers.php';
//profile table / id, name, location, description, profile_img, created_at 

// CREATE TABLE comments (
// 	   id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     comment_user TINYTEXT NOT NULL,
//     comment LONGTEXT NOT NULL,
//     img_id int(11),
//     profile_img LONGTEXT NOT NULL,
//     created_at TIMESTAMP NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
// );

if (isset($_POST['submit']) && isset($_SESSION['uid'])) {

    require_once '../config/db.php';
    
    $username = $_SESSION['uid'];
    $comment = $_POST['comment'];
    $imgId = $_POST['img_id'];

    if (empty($comment)) {
        header('Location: ../post.php?img=' . $imgId);
        exit();
    } else {
        
        //Get user's profile image from profiles table
        $sql = 'SELECT profile_img FROM profiles WHERE profile_name=?';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../index.php');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $profileImg);
            mysqli_stmt_fetch($stmt);

            //Store comments in the comments table
            $sql = 'INSERT INTO comments (comment_user, comment, img_id, profile_img) VALUES (?, ?, ?, ?);';
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header('Location: ../post.php?img=' . $_POST['img_id']);
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, 'ssis', $username, $comment, $imgId, $profileImg);
                mysqli_stmt_execute($stmt);
                header('Location: ../post.php?img=' . $_POST['img_id']);
                exit();
            }
        }
    }
} else {
    header('Location: ../index.php');
    exit();
}