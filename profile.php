<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="post">
    <div class="profile-banner" style="
        background-image: url(uploads/banner.jpg);
        background-color: rgb(30, 30, 30);
        background-size: cover;
        background-repeat: no-repeat;
        ">
        <img src="uploads/icon2.jpg" alt="profile icon" class="profile-icon">
        <div class="profile-info">
            <h1>Username</h1>
            <p>Description</p>
            <p>Shanghai, China</p>
        </div>
    </div>
    <div class="gallery">
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
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>