<?php

session_start();
require_once "../conn.php";

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
    <?php
    echo ('<div class="cards">' . "\n");
    echo ('<div class="small-container">' . "\n");
    if (isset($_SESSION['Admin_ID'])) {

        $stmt2 = $pdo->prepare("SELECT * FROM registration WHERE Reg_Status='Approved'");
        $stmt2->execute(array());

        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $rid = $row['Regist_ID'];
            $usid = $row['User_ID'];
            $fname = $row['First_Name'];
            $lname = $row['Last_Name'];
            $mail = $row['Email_Address'];
            $uadd = $row['User_Address'];
            $pstCode = $row['Postal_Code'];
            $phn = $row['Phone_Number'];
            $stat = $row['Reg_Status'];
            $dateofapp = $row['DateOfApp'];

            echo ("<h2 class='title'>Appointments</h2>" . "\n");
            echo ('<table class="content-table">' . "\n");
            echo ('<thead>' . "\n");
            echo ('<tr>' . "\n");
            echo ('<th class="pid"><b>RegID</b></th>' . "\n");
            echo ('<th class="pro"><b>First Name</b></th>' . "\n");
            echo ('<th class="qty"><b>Last Name</b></th>' . "\n");
            echo ('<th class="price"><b>Email</b></th>' . "\n");
            echo ('</tr>' . "\n");
            echo ('</thead>' . "\n");
            echo ('<tbody>' . "\n");
            echo ('<tr>' . "\n");
            echo ("<td>$rid</td>" . "\n");
            echo ("<td>$fname</td>" . "\n");
            echo ("<td>$lname</td>" . "\n");
            echo ("<td>$mail</td>" . "\n");
            echo ('</tr>' . "\n");
            echo ('</tbody>' . "\n");
            echo ('</table>' . "\n");

            echo ("<p><b>Address:</b> $uadd</p>" . "\n");
            echo ("<p><b>Postal Code:</b> $pstCode</p>" . "\n");
            echo ("<p><b>Phone Number:</b> $phn</p>" . "\n");
            echo ("<p><b>Status:</b> $stat</p>" . "\n");
            echo ("<p><b>Date:</b> $dateofapp</p>" . "\n");

            echo ("</br>" . "\n");
            echo ("</br>" . "\n");
            echo ("</br>" . "\n");
        }

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