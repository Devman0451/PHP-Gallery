<?php
include_once "includes/header.inc.php";

if (!isset($_SESSION['uid'])) {
    header("Location: index.php");
    exit();
}

include_once "navbar.php";
?>

<section class="signup tos">
    <div class="signup--container">
        <h2>Upload Image</h2>

        <?php
            if(isset($_GET['error'])) {
                $error = $_GET['error'];

                if($error == "imgerror") {
                    echo '<p class="errormsg">There was a problem with the image file.</p>';
                } else if($error == "invalidfile") {
                    echo '<p class="errormsg">Invalid file type.</p>';
                } else if($error == "imgsize") {
                    echo '<p class="errormsg">File size too big.</p>';
                }
            }
        ?>

        <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data" class="signup-form upload-form">
            <input type="hidden" name="key" value="2NDvBgJ4pP2R9NzGWAbhiPYzx1UwQhtO">
            <label for="title">Title</label>
            <input type="text" name="title">
            <label for="keywords">Keywords <span class="keyword--span">*separate with commas*</span></label>
            <input type="text" name="keywords">
            <label for="image" class="upload--fileupload">Select Image</label>
            <input type="file" name="image" id="image">
            <span class="filename">No File Selected</span>
            <label for="description">Description</label>
            <textarea name="description" cols="30" rows="10"></textarea>
            <input type="submit" name="submit" value="Upload" class="signup-btn">
        </form>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>