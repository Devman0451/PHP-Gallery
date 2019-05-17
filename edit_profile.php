<?php
include_once "includes/header.inc.php";
include_once "navbar.php";

//Loads existing user data into form fields.  Redirects to index.php if not signed in as a user.
if (isset($_SESSION['uid']) && isset($_SESSION['id'])) {

    require_once 'config/db.php';
    
    $username = $_SESSION['uid'];

    $sql = 'SELECT profile_name, location, description, profile_img FROM profiles WHERE profile_name=?';
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $profileName, $location, $description, $profileImage);
        mysqli_stmt_fetch($stmt);
    }

} else {
    header("Location: index.php");
    exit();
}
?>

<section class="signup">
    <div class="signup--container">
        <h2>Edit Profile</h2>
        
        <?php
            if(isset($_GET['error'])) {
                $error = $_GET['error'];

                if ($error == "emptyfield") {
                    echo '<p class="errormsg">Please fill out all fields.</p>';
                } else if ($error == "imgsize") {
                    echo '<p class="errormsg">Image size is too large.</p>';
                } else if ($error == "imgerror") {
                    echo '<p class="errormsg">Problem with image file.</p>';
                } 
            }
        ?>

        <form action="includes/edit_profile.inc.php" method="post" class="signup-form" enctype="multipart/form-data">
            <label for="last">* Location</label>
            <input type="text" name="location"  value="<?php echo $location; ?>">
            <label for="uid">* Description</label>
            <input type="text" name="description" value="<?php echo $description; ?>">
            <label>Profile Image</label>
            <label for="image" class="upload--fileupload">Select Image</label>
            <input type="file" name="image" id="image">
            <span class="filename">No File Selected</span>
            <input type="submit" name="submit" value="Submit" class="signup-btn">
        </form>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>