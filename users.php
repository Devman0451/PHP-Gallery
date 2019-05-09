<?php
include_once "includes/header.inc.php";
include_once "navbar.php";
?>

<section class="users">
    <h1 class="users-title">Users</h1>
    <div class="users-container">
        <table class="users-table">
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Date Joined</th>
            </tr>
            <tr>
                <td><a href="profile.php"><img src="uploads/icon2.jpg" alt="avatar"></a></td>
                <td><a href="profile.php">User9883</a></td>
                <td>12-9-2012</td>
            </tr>
        </table>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>