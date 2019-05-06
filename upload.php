<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="signup tos">
    <div class="signup--container">
        <h2>Upload Image</h2>
        <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data" class="signup-form upload-form">
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