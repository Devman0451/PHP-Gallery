<?php

//Validate form submission, prevent user from navigating to script url without the form submission
if (isset($_POST['submit']) && $_POST['key'] === 'o0DEjArU99z1StkWgd6KY81Tq5EnZljk') {

    require_once '../config/db.php';

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if (empty($uid) || empty($pwd)) {
        header('Location: ../signin.php?error=emptyfields');
        exit();
    } else {

        //User can use either username or email address to login
        $sql = 'SELECT * FROM users WHERE user_uid=? OR user_email=?';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../signin.php?error=sqlerror');
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, 'ss', $uid, $uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $verifyPwd = password_verify($pwd, $row['user_pwd']);

                if ($verifyPwd == false) {
                    header('Location: ../signin.php?error=uidpwd');
                    exit();
                } else if ($verifyPwd == true) {

                    //Save user credentials
                    session_start();
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['uid'] = $row['user_uid'];
                    header('Location: ../index.php?signin=success');
                } else {
                    header('Location: ../signin.php?error=uidpwd');
                    exit();
                }
            } else {
                header('Location: ../signin.php?error=uidpwd');
                exit();
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header('Location: ../signin.php');
    exit();
}
