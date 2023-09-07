<div class="navbar">
    <div class="logo">
        <a href="admin-main.php">
            <img src="images/logonavbar.svg" width="30px">
        </a>
    </div>
    <nav>
        <ul id="Menu">
            <li><a href="admin-main.php">Home</a></li>
            <li><a href="manage-admin.php">Admins</a></li>
            <li><a href="admin-appointments.php">Appointments</a></li>
            <li>
                <?php
                if (isset($_SESSION['Admin_ID'])) { ?>

                    <a href="logout.php">Logout</a>

                <?php } else { ?>

                    <a href="admin-login.php">Login</a>

                <?php } ?>
            </li>
        </ul>
    </nav>