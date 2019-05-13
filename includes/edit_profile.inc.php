<?php

if (isset($_POST['submit']) && isset($_SESSION['uid'])) {

    $profileName = $_POST['profileName'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    
    //Checks if a new profile image was selected
    if (isset($_POST['image'])) {

    } else {

    }

} else {
    header("Location: ../index.php");
    exit();
}