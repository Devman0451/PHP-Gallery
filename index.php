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
            <li><a href="#" rel="">Lastest</a></li>
            <li><a href="#" rel="">Trending</a></li>
        </ul>
    </section>

    <section class="gallery">

        <?php

        //Load Images from db
        include_once 'config/db.php';

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
                                    <img src="uploads/icon2.jpg" alt="profile" class="avatar">
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
        ?>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

        <a href="" class="image-link">
            <div class="project">
                <div class="overlay">
                    <div class="info">
                        <img src="uploads/icon2.jpg" alt="profile" class="avatar">
                        <div class="image-info">
                            <div class="title">Title</div>
                            <div class="author">Author</div>
                        </div>
                    </div>
                </div>
                <img src="uploads/img1.jpg" alt="" class="image">
            </div>
        </a>

    </section>
</main>

<?php
include_once "includes/footer.inc.php";
?>