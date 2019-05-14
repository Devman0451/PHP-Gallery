<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<main>
    <?php

    //Check Error message queries
    if (isset($_GET['signin'])) {
        $msg = $_GET['signin'];

        if ($msg = 'success') {
            echo '<div class="successmsg">You have successfully signed in.</div>';
        }
    }

    if (isset($_GET['logout'])) {
        $msg = $_GET['logout'];

        if ($msg = 'success') {
            echo '<div class="successmsg">Successfully logged out.</div>';
        }
    }
    ?>
    <section class="imagelinks--container">
        <ul class="imagelinks--list">
            <li><a href="index.php?load=latest" rel="">Lastest</a></li>
            <li><a href="index.php?load=trending" rel="">Trending</a></li>
        </ul>
    </section>

    <section class="gallery">

        <?php


        include_once 'config/db.php';

        //Load images from database based on search fields
        if (isset($_GET['search'])) {

            $search = $_GET['search'];

            //Searches tags and title for keywords
            $sql = "SELECT id, title, uploader, image_thumb FROM images WHERE tags LIKE CONCAT('%', ?, '%') OR title LIKE CONCAT('%', ?, '%');";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ss', $search, $search);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $id, $title, $uploader, $image_thumb);

                if (mysqli_stmt_num_rows($stmt) == 0) {
                    echo '<p class="search-msg">No Results Found</p>';
                } else {
                    while (mysqli_stmt_fetch($stmt)) {
                        echo '<a href="post.php?img=' . $id . '" class="image-link">
                                <div class="project">
                                    <div class="overlay">
                                        <div class="info">
                                            <img src="uploads/icons/default.jpg" alt="profile" class="avatar">
                                            <div class="image-info">
                                                <div class="title">' . $title . '</div>
                                                <div class="author">' . $uploader . '</div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="' . $image_thumb . '" alt="" class="image">
                                </div>
                             </a>';
                    }
                }
            } else {
                echo '<p>ERROR</p>';
            }
        } else if (isset($_GET['load']) && $_GET['load'] == 'trending') {
            
            //Load the trending images
            $sql = "SELECT id, title, uploader, image_thumb FROM images ORDER BY date DESC LIMIT 30;";
            $stmt = mysqli_stmt_init($conn);
    
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $title, $uploader, $image_thumb);
    
                while (mysqli_stmt_fetch($stmt)) {
                    echo '<a href="post.php?img=' . $id . '" class="image-link">
                            <div class="project">
                                <div class="overlay">
                                    <div class="info">
                                        <img src="uploads/icons/default.jpg" alt="profile" class="avatar">
                                        <div class="image-info">
                                            <div class="title">' . $title . '</div>
                                            <div class="author">' . $uploader . '</div>
                                        </div>
                                    </div>
                                </div>
                                <img src="' . $image_thumb . '" alt="" class="image">
                            </div>
                         </a>';
                }
            }
        } else if (isset($_GET['load']) && $_GET['load'] == 'latest') {
            
            //Load the latest images
            $sql = "SELECT id, title, uploader, image_thumb FROM images ORDER BY date DESC LIMIT 30;";
            $stmt = mysqli_stmt_init($conn);
    
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id, $title, $uploader, $image_thumb);
    
                while (mysqli_stmt_fetch($stmt)) {
                    echo '<a href="post.php?img=' . $id . '" class="image-link">
                            <div class="project">
                                <div class="overlay">
                                    <div class="info">
                                        <img src="uploads/icons/default.jpg" alt="profile" class="avatar">
                                        <div class="image-info">
                                            <div class="title">' . $title . '</div>
                                            <div class="author">' . $uploader . '</div>
                                        </div>
                                    </div>
                                </div>
                                <img src="' . $image_thumb . '" alt="" class="image">
                            </div>
                         </a>';
                }
            }
        } 

        ?>

    </section>
</main>

<?php
include_once "includes/footer.inc.php";
?>