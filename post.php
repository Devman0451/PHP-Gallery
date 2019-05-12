<?php
include_once "includes/header.inc.php";
include_once "navbar.php";

include_once "config/db.php";

//Get image data from the database
if (isset($_GET['img'])) {

    $id = $_GET['img'];

    $sql = 'SELECT id, title, uploader, description, image_url, tags, date FROM images WHERE id=?';
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $title, $uploader, $description, $image_url, $tags, $date);
        mysqli_stmt_fetch($stmt);
    }
} else {
    header('Location: index.php');
}
?>

<section class="post">
    <div class="post-container">
        <h1><?php echo $title; ?> <span>by</span> <?php echo $uploader; ?></h1>
        <h4><?php echo $date; ?></h4>
        <div class="post--image-container">
            <img src="<?php echo $image_url; ?>" alt="upload">
        </div>
        <h4>Description</h4>
        <p class="description"><?php echo $description; ?>.</p>
        <p class="tags"><strong>Tags: </strong><?php echo $tags; ?></p>
        <div class="comments">
            <h4>Comments</h4>
            <ul class="comments-list">
                <?php
                if (isset($_GET['img'])) {
                    $id = $_GET['img'];

                    //Get comments from the database
                    $sql = 'SELECT comment_user, comment, profile_img, created_at FROM comments WHERE img_id=?';
                    $stmt = mysqli_stmt_init($conn);

                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'i', $id);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $commentUser, $comment, $profileImage, $createdAt);

                        while(mysqli_stmt_fetch($stmt)) {
                            echo '<li>
                                    <div class="comment-single">
                                        <p>' . $commentUser . '<span> on </span>' . date("m/d/y", strtotime($createdAt)) . '</p>
                                        <p>' . $comment . '</p>
                                    </div>
                                </li>';
                        };
                    }
                } else {
                    header('Location: index.php');
                }
                ?>
            </ul>
        </div>
        <?php
        if (isset($_SESSION['uid'])) {
            echo '<form action="includes/comment.inc.php" method="post" class="comment-form">
                        <input type="hidden" name="img_id" value="' . $id . '">
                        <textarea name="comment" cols="30" rows="10" class="comment"></textarea>
                        <input type="submit" name="submit" value="Submit" class="btn-subscribe">
                    </form>';
        }
        ?>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>