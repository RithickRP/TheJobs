<?php

session_start();
require_once "conn.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheJobs | Profile</title>
    <link href='admin/images/logonavbar.svg' rel='icon' />
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <div class="container">

            <!--Navigation Bar-->
            <?php include("navbar.php"); ?>
        </div>
    </div>

    <div class="small-container">
        <?php
        if (isset($_SESSION['Username'])) {

            $stmt = $pdo->prepare("SELECT Username, FirstName, LastName, Email, PhoneNumber FROM account WHERE User_ID=:uid");
            $stmt->execute(
                array(
                    ':uid' => $_SESSION['Username']
                )
            );

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $UID = $row['User_ID'];
            $mail = $row['Email'];
            $fname = $row['FirstName'];
            $lname = $row['LastName'];
            $phn = $row['PhoneNumber'];
            $uname = $row['Username'];

            $stmt2 = $pdo->prepare("SELECT Reg_Status, DateOfApp, TimeOfApp FROM registration WHERE User_ID=:uid");
            $stmt2->execute(
                array(
                    ':uid' => $_SESSION['Username']
                )
            );



            echo ("<h2 class=title>$uname's Profile </h2>" . "\n");
            echo ('<div class="profile">' . "\n");
            echo ('<div class="leftbox">' . "\n");
            echo ('<nav class="profilenav">' . "\n");
            echo ('<a onclick="tabs(0)" class="tab">' . "\n");
            echo ('<i class="fa fa-user"></i>' . "\n");
            echo ('</a>' . "\n");
            echo ('<a onclick="tabs(1)" class="tab">' . "\n");
            echo ('<i class="fa fa-tasks"></i>' . "\n");
            echo ('</a>' . "\n");
            echo ('</nav>' . "\n");
            echo ('</div>' . "\n");
            echo ('<div class="rightbox">' . "\n");
            echo ('<div class="profile tabShow">' . "\n");
            echo ('<form method="post" action="profile-update-pinfo.php">' . "\n");
            echo ('<h1 class="prf">Personal Info</h1>' . "\n");
            echo ('<h2 class="prf2">First Name</h2>' . "\n");
            echo ("<input type='text' name='pi-fname' class='ipt' value='$fname'>" . "\n");
            echo ('<h2 class="prf2">Last Name</h2>' . "\n");
            echo ("<input type='text' name='pi-lname' class='ipt' value='$lname'>" . "\n");
            echo ('<h2 class="prf2">Email</h2>' . "\n");
            echo ("<input type='text' class='ipt' value='$mail' readonly>" . "\n");
            echo ('<h2 class="prf2">Phone Number</h2>' . "\n");
            echo ("<input type='text' name='pi-phn' class='ipt' value='$phn'>" . "\n");
            echo ('<button class="prof-update">Update</button>' . "\n");
            echo ('</form>' . "\n");
            echo ('</div>' . "\n");
            echo ('</div>' . "\n");
            // adas
            echo ('<div class="rightbox">' . "\n");
            echo ('<div class="profile tabShow">' . "\n");
            while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $regstat = $row['Reg_Status'];
                $doa = $row['DateOfApp'];
                $toa = $row['TimeOfApp'];
                echo ('<form method="post" action="">' . "\n");
                echo ('<h2 class="prf2">Appointment</h2>' . "\n");
                echo ("<h4 class='sta'>Status: $regstat</h4>" . "\n");
                echo ("<h4 class='sta'>Date: $doa</h4>" . "\n");
                echo ("<h4 class='sta'>Time: $toa</h4>" . "\n");
                echo ('</form>' . "\n");
            }
            echo ('</div>' . "\n");
            echo ('</div>' . "\n");
            echo ('</div>' . "\n");
            echo ('</div>' . "\n");

        } else {

            echo ('<h2>Please <a href="log.php">Login</a> to your account</h2>');
            echo ('<p>Click on "Login"</p>');

        }
        ?>
        <br />
        <br />
        <br />
        <br />
    </div>

    <script>
        const tabBtn = document.querySelectorAll(".tab");
        const tab = document.querySelectorAll(".tabShow");

        function tabs(panelIndex) {
            tab.forEach(function (node) {
                node.style.display = "none";
            });
            tab[panelIndex].style.display = "block";
        }
        tabs(0);
    </script>
    <script>
        $(".tab").click(function () {
            $(this).addClass("active").siblings().removeClass("active");
        })
    </script>

    <!-----footer ----->
    <?php include("footer.php"); ?>
</body>

</html>