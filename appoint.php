<?php

session_start();
require_once "conn.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheJobs | HOME</title>
    <link href='admin/images/logonavbar.svg' rel='icon' />
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <div class="container">

            <!--Navigation Bar-->
            <?php include("navbar.php"); ?>

            <?php

            if (isset($_SESSION['Username'])) {

                $stmt = $pdo->prepare("SELECT User_ID, Username, FirstName, LastName, Email, PhoneNumber, UserAddress FROM account WHERE User_ID=:uid");
                $stmt->execute(
                    array(
                        ':uid' => $_SESSION['Username']
                    )
                );

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $usID = $row['User_ID'];
                $mail = $row['Email'];
                $fname = $row['FirstName'];
                $lname = $row['LastName'];
                $phn = $row['PhoneNumber'];
                $addr = $row['UserAddress'];
                $uname = $row['Username'];

                $stmt = $pdo->prepare("SELECT User_ID, First_Name, Last_Name, Email_Address, User_Address, Job_Role, Availability_DT, Postal_Code, Phone_Number FROM registration WHERE User_ID=:userid");
                $stmt->execute(
                    array(
                        ':userid' => $_SESSION['Username']
                    )
                );

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $IDuser = $usID;
                $firstN = $fname;
                $lastN = $lname;
                $email = $mail;
                $phoneN = $phn;
                $uAdd = $addr;
                $jobR = $jrole;
                $avail = $availDT;
                $pstCode = $row['Postal_Code'];

                echo ('<form method="post" action="complete-appoint.php">' . "\n");
                echo ('<div class="wrapper">' . "\n");
                echo ('<div class="title">Registration Form</div>' . "\n");
                echo ('<div class="form">' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>First Name</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-fname' class='input' value='$firstN' placeholder='example:Dwayne' required>" . "\n");
                echo ('</div>  ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>Last Name</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-lname' class='input' value='$lastN' placeholder='example:Johnson' required>" . "\n");
                echo ('</div>  ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>Job Role</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-jobr' class='input' value='$jobR' placeholder='example:Software Engineer' required>" . "\n");
                echo ('</div>  ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>Availability Date & Time</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-avail' class='input' value='$avail' placeholder='example:Mon-Fri 12:00PM' required>" . "\n");
                echo ('</div>  ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>Email Address</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-mail' class='input' value='$email' placeholder='example:djohnson@gmail.com' required>" . "\n");
                echo ('</div> ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>Phone Number</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-phn' class='input' value='$phoneN' placeholder='example:077*******' required>" . "\n");
                echo ('</div> ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>Address</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-uadd' class='input' value='$uAdd' placeholder='example:Lane and City' required>" . "\n");
                echo ('</div> ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<label>Postal Code</label>' . "\n");
                echo ("<input type='text' id='fname' name='re-postal' class='input' value='$pstCode' placeholder='example:12345' required>" . "\n");
                echo ('</div> ' . "\n");
                echo ('<div class="inputfield">' . "\n");
                echo ('<input type="submit" value="Register" class="btn">' . "\n");
                echo ('</div>' . "\n");
                echo ('</div>' . "\n");
                echo ('</div>' . "\n");
                echo ('</div>' . "\n");
                echo ('</form>' . "\n");

            } else {

                echo ('<h2>Please <a href="log.php">Login</a> to your account</h2>');
                echo ('<p>Click on "Login"</p>');

            }


            ?>


            <!-----footer ----->
            <?php include("footer.php"); ?>

</body>

</html>