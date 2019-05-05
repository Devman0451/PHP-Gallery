<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="signup">
    <div class="signup--container">
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post" class="signup-form">
            <label for="first">* First name</label>
            <input type="text" name="first" placeholder="E.g. John">
            <label for="last">* Last name</label>
            <input type="text" name="last" placeholder="E.g. Doe">
            <label for="uid">* Username</label>
            <input type="text" name="uid" placeholder="E.g. johndoe99">
            <label for="email">* Email name</label>
            <input type="email" name="email" placeholder="E.g. johndoe@gmail.com">
            <label for="pwd">* Password</label>
            <input type="password" name="pwd">
            <label for="pwd">* Re-type Password</label>
            <input type="password" name="pwd2">
            <input type="submit" name="submit" value="Sign Up" class="signup-btn">
        </form>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>