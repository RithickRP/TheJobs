<?php
//login
session_start();
require_once "conn.php";
if (isset($_POST["login"])) {

    unset($_SESSION["Username"]);

    $query = "SELECT User_ID,Username, Pass FROM account WHERE Username = :Username AND Pass = :Pass";
    $stmt = $pdo->prepare($query);
    $stmt->execute(
        array(

            ':Username' => $_POST['Username'],
            ':Pass' => $_POST['Pass']

        )
    );

    $row = $stmt->fetch(PDO::FETCH_ASSOC); //row select

    if ($row === FALSE) {
        $message = '<label>Wrong Data</label>';


    } else {

        $_SESSION['Username'] = $row['User_ID'];
        header('Location: index.php');
        return;


    }
}

?>

<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheJobs | Account</title>
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
            <div class="navbar">
                <div class="logo">
                    <img src="admin/images/logonavbar.svg" width="30px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="">Account</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="form-box">

        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log In</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>
            <a href="index.php"><button type="button" class="toggle-btn" onclick="guest()">Guest</button></a>
        </div>
        <!--<div class="social-icons"></div>-->
        <form id="login" class="input-group" action="" method="POST">
            <input type="text" class="input-field" name="Username" placeholder="Username" required="">
            <input type="password" class="input-field" name="Pass" placeholder="Enter Password" required="">
            <input type="checkbox" class="check-box"><span>Remember Password</span>
            <button type="submit" name="login" class="submit-btn">Log In</button>
        </form>
        <form id="register" class="input-group" action="registration.php" method="POST">
            <input type="text" class="input-field" name="Username" placeholder="Username" required="">
            <input type="password" class="input-field" name="Pass" placeholder="Password" required="">
            <input type="email" class="input-field" name="Email" placeholder="E-Mail" required="">
            <input type="checkbox" class="check-box" required=""><span>I Agree to the terms & conditions</span>
            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>


    <!-----footer ----->
    <?php include("footer.php"); ?>
    <!-----js for toggle login and register----->
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {

            x.style.left = "-400px"
            y.style.left = "50px"
            z.style.left = "99px";

        }

        function login() {

            x.style.left = "50px"
            y.style.left = "450px"
            z.style.left = "0px";

        }

        function guest() {

            x.style.left = "-400px"
            y.style.left = "50px"
            z.style.left = "210px";

        }
    </script>
    <!-----js for menu toogle for mobiles and smaller screens----->
    <script>
        var MenuItems = document.getElementByID("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {

            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }

        }
    </script>
</body>

</html>

</body>

</html>