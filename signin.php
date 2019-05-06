<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="signup">
    <div class="signup--container">
        <h2>Sign In</h2>

        <?php
            if(isset($_GET['error'])) {
                $error = $_GET['error'];

                if($error == "emptyfields") {
                    echo '<p class="errormsg">Please fill out all fields.</p>';
                } else if($error == "uidpwd") {
                    echo '<p class="errormsg">Invalid username or password.</p>';
                }
            }
        ?>

        <form action="includes/signin.inc.php" method="post" class="signup-form">
            <label for="email">Username or email</label>
            <input type="text" name="uid" placeholder="E.g. johndoe9 or johndoe@gmail.com" autocomplete="username">
            <label for="pwd">Password</label>
            <input type="password" name="pwd" autocomplete="current-password">
            <input type="submit" name="submit" value="Sign In" class="signup-btn">
        </form>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>