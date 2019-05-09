<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="signup">
    <div class="signup--container">
        <h2>Sign Up</h2>
        
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

        <form action="includes/signup.inc.php" method="post" class="signup-form">
            <input type="hidden" name="key" value="L3FDTnVz41nVcTz9gULfIktvyq3lNORD">
            <label for="first">* First name</label>
            <input type="text" name="first" placeholder="E.g. John" value="<?php if (isset($_GET['first'])) echo $_GET['first'];?>">
            <label for="last">* Last name</label>
            <input type="text" name="last" placeholder="E.g. Doe"  value="<?php if (isset($_GET['last'])) echo $_GET['last'];?>">
            <label for="uid">* Username</label>
            <input type="text" name="uid" placeholder="E.g. johndoe99"  autocomplete="username" value="<?php if (isset($_GET['uid'])) echo $_GET['uid'];?>">
            <label for="email">* Email name</label>
            <input type="email" name="email" placeholder="E.g. johndoe@gmail.com" autocomplete="email" value="<?php if (isset($_GET['email'])) echo $_GET['email'];?>">
            <label for="pwd">* Password</label>
            <input type="password" name="pwd" autocomplete="current-password">
            <label for="pwd">* Re-type Password</label>
            <input type="password" name="pwd2" autocomplete="new-password">
            <input type="submit" name="submit" value="Sign Up" class="signup-btn">
        </form>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>