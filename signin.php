<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="signup">
    <div class="signup--container">
        <h2>Sign In</h2>
        <form action="" method="post" class="signup-form">
            <label for="email">Username or email</label>
            <input type="email" name="uid" placeholder="E.g. johndoe9 or johndoe@gmail.com">
            <label for="pwd">Password</label>
            <input type="password" name="pwd">
            <input type="submit" name="submit" value="Sign In" class="signup-btn">
        </form>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>