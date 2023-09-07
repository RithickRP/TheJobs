<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheJobs | Admin</title>
    <link href='images/logonavbar.svg' rel='icon' />
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="header">
        <div class="container">
            <!--Navigation Bar-->
            <?php include("admin-main-navbar.php"); ?>

        </div>
    </div>
    </div>

    <div class="cards">
        <div class="small-container">
            <?php
            if (isset($_SESSION['Admin_ID'])) { ?>
                <div class="row">
                    <div class="card-col">
                        <a href="manage-admin.php">
                            <img src="images/admin.png" width="10px">
                            <h3>Manage Admins</h3>
                        </a>
                    </div>
                    <div class="card-col">
                        <a href="admin-appointments.php">
                            <img src="images/order.png" width="10px">
                            <h3>Appointments</h3>
                        </a>
                    </div>
                </div>
                <?php
            } else { ?>

                <h2>Please <a href="admin-login.php">Login</a> to your administrator account</h2>
                <p>Click on "Login"</p>

            <?php
            }
            ?>
        </div>
    </div>
    <br /><br /><br /><br /><br /><br />
    <!-----footer ----->
    <?php include("footer-admin.php"); ?>

</body>

</html>