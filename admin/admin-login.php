<?php
session_start();
require_once "../conn.php";
if (isset($_POST["admin-login"])) {

    unset($_SESSION["Admin_ID"]);
    $query = "SELECT Admin_ID, Username, Pass FROM admin WHERE Username = :Username AND Pass = :Pass";
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

        $_SESSION['Admin_ID'] = $row['Admin_ID'];
        header('Location: admin-main.php');
        return;


    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheJobs | Account</title>
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


            <div class="form-box">
                <h2 class="title">Admin Login</h2>
                <!--<div class="social-icons"></div>-->
                <form id="admin-login" class="input-group" action="" method="POST">
                    <input type="text" class="input-field" name="Username" placeholder="Username" required="">
                    <input type="password" class="input-field" name="Pass" placeholder="Enter Password" required="">
                    <br /><br /><br /><br />
                    <button type="submit" name="admin-login" class="submit-btn">Log In</button>
                </form>
            </div>
        </div>
    </div>
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