<div class="navbar">
    <div class="logo">
        <a href="index.php">
            <img src="admin/images/logonavbar.svg" width="30px">
        </a>
    </div>
    <nav>
        <ul id="Menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li>
                <?php
                if (isset($_SESSION['Username'])) { ?>

                    <a href="logout-main.php">Logout</a>
                <li><a href="profile.php">Profile</li></a>
                <?php ?>

            <?php } else { ?>

                <a href="log.php">Login</a>

            <?php } ?>
            </li>
        </ul>
    </nav>
    <img src="admin/images/menu.png" class="menu-icon" onclick="menutoggle()">
</div>