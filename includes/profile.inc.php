<?php
session_start();

//profile table / id, name, location, description, profile_img, created_at 

// CREATE TABLE profiles (
// 	   id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     profile_name TINYTEXT NOT NULL,
//     location TINYTEXT NOT NULL,
//     description LONGTEXT NOT NULL,
//     profile_img LONGTEXT NOT NULL,
//     created_at TIMESTAMP NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
// );

//Creates a profile for the recently registered user
if (isset($_SESSION['username'])) {
    
    require_once '../config/db.php';

    $username = $_SESSION['username'];

    //Check if user exists
    $sql = 'SELECT * FROM users WHERE user_uid=?;';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../index.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck <= 0) {
            header('Location: ../index.php?error=nouserexists');
            exit();
        } else {

            //Check if a profile already exists
            $sql = 'SELECT * FROM profiles WHERE profile_name=?;';
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header('Location: ../index.php?error=sqlerror');
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);

                if($resultCheck > 0) {
                    header('Location: ../index.php?error=profileexists');
                    exit();
                } else {

                    //Insert new profile into table if the user exists and a profile doesn't exist
                    $location = 'Not Given';
                    $description = 'No Description';
                    $profile_image = 'uploads/icons/default.jpg';

                    $sql = 'INSERT INTO profiles (profile_name, location, description, profile_img) VALUES (?, ?, ?, ?);';
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        die('TEST');
                        header('Location: ../index.php?error=sqlerror');
                        exit();
                    } else {

                        mysqli_stmt_bind_param($stmt, 'ssss', $username, $location, $description, $profile_image);
                        mysqli_stmt_execute($stmt);

                        session_unset();
                        session_destroy();

                        header('Location: ../index.php?signup=success');
                        exit();
                    }

                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    session_unset();
    session_destroy();
}
