<?php
include_once '../functions/helpers.php';
session_start();

//Updates user profile
if (isset($_POST['submit']) && isset($_SESSION['uid'])) {

    require '../config/db.php';

    $username = $_SESSION['uid'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    //Checks if a new profile image was selected
    if ($_FILES['image']['size'] > 0) {

        $image = $_FILES['image'];

        $imgName = $image['name'];
        $imgTmpName = $image['tmp_name'];
        $imgSize = $image['size'];
        $imgError = $image['error'];
        $imgType = $image['type'];

        $imgExt = explode('.', $imgName);
        $extension = strtolower(end($imgExt));

        $allowableExt = ['jpg', 'jpeg', 'png'];

        if (in_array($extension, $allowableExt)) {
            if ($imgError === 0) {
                if ($imgSize <= 15000) {

                    //Generate unique name and store in uploads folder
                    $iconUploadName = $username . '_' . uniqid('', true) . '.' . $extension;
                    $dest = 'uploads/icons/' . $iconUploadName;
                    move_uploaded_file($imgTmpName, "../$dest");

                    //Upload changes to the database
                    $sql = 'UPDATE profiles SET location=?, description=?, profile_img=? WHERE profile_name=?;';
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header('Location: ../edit_profile.php?error=sqlerror');
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, 'ssss', $location, $description, $dest, $username);
                        mysqli_stmt_execute($stmt);
                        header('Location: ../profile.php?user=' . $username);
                    }
                } else {
                    header('Location: ../edit_profile.php?error=imgsize');
                    exit();
                }
            } else {
                header('Location: ../edit_profile.php?error=imgerror');
                exit();
            }
        }
    } else {
        //No image to upload
        //Upload changes to the database
        $sql = 'UPDATE profiles SET location=?, description=? WHERE profile_name=?;';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../edit_profile.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'sss', $location, $description, $username);
            mysqli_stmt_execute($stmt);
            header('Location: ../profile.php?user=' . $username);
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header('Location: ../index.php?exit');
    exit();
}
