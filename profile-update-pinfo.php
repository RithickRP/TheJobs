<?php

session_start();
require_once "conn.php";

if (isset($_SESSION['Username'])) {

    if (isset($_POST['pi-fname']) && isset($_POST['pi-phn']) && isset($_POST['pi-lname'])) {

        $stmt = $pdo->prepare("UPDATE account SET LastName=:ln, FirstName=:fn, PhoneNumber=:pn WHERE User_ID=:uid");
        $stmt->execute(
            array(
                ":uid" => $_SESSION['Username'],
                ":fn" => $_POST['pi-fname'],
                ":ln" => $_POST['pi-lname'],
                ":pn" => $_POST['pi-phn']
            )
        );
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        header('Location:profile.php');
        return;
    } else {

        echo ('<p>Error</p>');

    }

} else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TheJobs | Login </title>
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

            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

        <div class="small-container">
            <h2>Please <a href="log.php">Login</a> to your account</h2>
            <p>Click on "Login"</p>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />


        <?php include("footer.php"); ?>




    <?php } ?>