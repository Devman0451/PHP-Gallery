<?php

//profile table / id, name, location, description, profile_img, created_at 

// CREATE TABLE profile (
// 	   id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     name TINYTEXT NOT NULL,
//     location TINYTEXT NOT NULL,
//     description LONGTEXT NOT NULL,
//     profile_img LONGTEXT NOT NULL,
//     created_at TIMESTAMP NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
// );

//Validate form submission, prevent user from navigating to script url without the form submission
if (isset($_POST['submit']) && $_POST['key'] === 'L3FDTnVz41nVcTz9gULfIktvyq3lNORD') {

    require '../config/db.php';

    $first = $_POST['first'];
    $last = $_POST['last'];
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];

    //Error check for user input
    if (empty($first) || empty($last) || empty($uid) || empty($email) || empty($pwd) || empty($pwd2)) {
        header("Location: ../signup.php?error=emptyfield&first=$first&last=$last&uid=$uid&email=$email");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail&first=$first&last=$last&uid=$uid");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        header("Location: ../signup.php?error=invaliduid&first=$first&last=$last&email=$email");
        exit();
    } else if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
        header("Location: ../signup.php?error=invalidname&&uid=$uid&email=$email");
        exit();
    } else if (strlen($pwd) < 6) {
        header("Location: ../signup.php?error=invalidpassword&first=$first&last=$last&uid=$uid&email=$email");
        exit();
    } else if ($pwd !== $pwd2) {
        header("Location: ../signup.php?error=invalidpwdmatch&first=$first&last=$last&uid=$uid&email=$email");
        exit();
    } else {

        //Checks for an existing username or an existing email
        $sql = "SELECT user_uid FROM users WHERE user_uid=? OR user_email=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=useremailtaken&first=$first&last=$last");
                exit();
            } else {

                //If the input passes all the checks, insert into the database table "users"
                $sql = "INSERT INTO users (user_first, user_last, user_uid, user_email, user_pwd) VALUES (?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $uid, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    header("Location: ../signup.php");
    exit();
}
