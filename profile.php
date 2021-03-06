<?php
include_once "includes/header.inc.php";

//Get profile for user
if (isset($_GET['user'])) {

    require_once 'config/db.php';

    $username = $_GET['user'];

    $sql = 'SELECT profile_name, location, description, profile_img, created_at FROM profiles WHERE profile_name=?;';
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $profileName, $location, $description, $profileImg, $createdAt);
        mysqli_stmt_fetch($stmt);
    }
} else {
    header('Location: index.php');
    exit();
}

include_once "navbar.php";

?>

<section class="post">
    <div class="profile-banner" style="
        background-color: rgb(45, 45, 45);
        background-size: cover;
        background-repeat: no-repeat;
        ">
        <img src="<?php echo  htmlspecialchars($profileImg); ?>" alt="profile icon" class="profile-icon">
        <div class="profile-info">
            <h1> <?php echo  htmlspecialchars($profileName); ?> </h1>
            <p> <?php echo  htmlspecialchars($description); ?> </p>
            <p> <?php echo  htmlspecialchars($location); ?> </p>
        </div>
    </div>
    <div class="gallery">

        <?php

        //Load Images from db

        if (isset($_GET['user'])) {
            $username = $_GET['user'];

            $sql = "SELECT id, title, uploader, image_thumb FROM images WHERE uploader=?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $title, $uploader, $image_thumb);

                while (mysqli_stmt_fetch($stmt)) {
                    echo '<a href="post.php?img=' . $id . '" class="image-link">
                <div class="project">
                    <div class="overlay">
                        <div class="info">
                            <img src="' .  htmlspecialchars($profileImg) . '" alt="profile" class="avatar">
                            <div class="image-info">
                                <div class="title">' .  htmlspecialchars($title) . '</div>
                                <div class="author">' .  htmlspecialchars($uploader) . '</div>
                            </div>
                        </div>
                    </div>
                    <img src="' .  htmlspecialchars($image_thumb) . '" alt="" class="image">
                </div>
             </a>';
                }
            }
        }
        ?>

    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>