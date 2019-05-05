<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<main>
    <?php
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