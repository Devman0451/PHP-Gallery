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
                } else if ($error == "invalidemail") {
                    echo '<p class="errormsg">Please enter a valid email address.</p>';
                } else if ($error == "invaliduid") {
                    echo '<p class="errormsg">Please enter a valid username.</p>';
                } else if ($error == "invalidname") {
                    echo '<p class="errormsg">First and last name can only contain letters.</p>';
                } else if ($error == "invalidpassword") {
                    echo '<p class="errormsg">Password must be at least 6 characters.</p>';
                } else if ($error == "invalidpwdmatch") {
                    echo '<p class="errormsg">Passwords don\'t match.</p>';
                }
            }
        ?>

        <form action="includes/edit_profile.inc.php" method="post" class="signup-form">
            <label for="first">* Profile Name</label>
            <input type="text" name="profileName" value="<?php echo $profileName; ?>">
            <label for="last">* Location</label>
            <input type="text" name="location"  value="<?php echo $location; ?>">
            <label for="uid">* Description</label>
            <input type="text" name="description" value="<?php echo $description; ?>">
            <label for="image">Profile Image</label>
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