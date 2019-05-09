<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="post">
    <div class="post-container">
        <h1>Title <span>by</span> Artist</h1>
        <h4>Date Created</h4>
        <div class="post--image-container">
            <img src="uploads/5cd43881f3b858.58227474.jpg" alt="upload">
        </div>
        <h4>Description</h4>
        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis aspernatur explicabo eligendi eveniet minus odit veritatis facere laboriosam nemo eius.</p>
        <div class="comments">
            <h4>Comments</h4>
            <ul class="comments-list">
                <li>
                    <div class="comment-single">
                        <p>Commenter <span>on</span> 4-12-2013</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid, nulla?</p>
                    </div>
                </li>
                <li>
                    <div class="comment-single">
                        <p>Commenter <span>on</span> 4-12-2013</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid, nulla?</p>
                    </div>
                </li>
                <li>
                    <div class="comment-single">
                        <p>Commenter <span>on</span> 4-12-2013</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid, nulla?</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>