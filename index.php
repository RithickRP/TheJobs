<?php

session_start();

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
            <div class="row">

                <div class="col-2">
                    <h1>Consultation<br>at it's best</h1>
                    <p>The Jobs is a leading consultation Centre in Colombo</p>
                    <a href="appoint.php" class="btn">Book Appointment &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="admin/images/main.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!------services------>
    <div class="services">
        <div class="small-container">
            <h2 class="title">Serivces</h2>
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Become faster, more flexible, and intensely customer-focused.</p>

                    <h3>Agile</h3>
                </div>
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <p>We help you make the right moves across all relevant levers of your business to accelerate higher
                        performance.</p>

                    <h3>Perfomance</h3>
                </div>
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <p>We help you balance all these considerations and more, ensuring that you attract and retain great
                        talent.</p>
                    <h3>Organization</h3>
                </div>
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <p>Change the trajectory of your business and achieve extraodinary results.</p>
                    <h3>Transformation</h3>
                </div>
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <p>Join the elite ranks of sustained value creators.</p>
                    <h3>Strategy</h3>
                </div>
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <p>We advise investors across the entire investment life cycle.</p>
                    <h3>Private Equity </h3>
                </div>
            </div>
        </div>
    </div>
    <!-----footer ----->
    <?php include("footer.php"); ?>

</body>

</html>