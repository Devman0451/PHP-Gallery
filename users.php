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
            <?php
                include_once "config/db.php";

                $sql = 'SELECT profile_name, profile_img, created_at FROM profiles LIMIT 20;';
                $stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $profileName, $profileImg, $createdAt);

                    while (mysqli_stmt_fetch($stmt)) {
                        echo '<tr>
                                <td><a href="profile.php?user=' . $profileName . '"><img src="' . $profileImg . '" alt="avatar"></a></td>
                                <td><a href="profile.php?user=' . $profileName . '">' . $profileName . '</a></td>
                                <td>' . date("m/d/y h:i:s A", strtotime($createdAt)) . '</td>
                            </tr>';
                    }
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            ?>
        </table>
    </div>
</section>

<?php
include_once "includes/footer.inc.php";
?>