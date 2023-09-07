<?php

session_start();

require_once "../conn.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheJobs| Admin</title>
    <link href='images/logonavbar.svg' rel='icon' />
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    if (isset($_SESSION['error'])) {
        echo ('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo ('<p style="color: green;">' . htmlentities($_SESSION['success']) . "</p>\n");
        unset($_SESSION['success']);
    }
    ?>
</head>

<body>
    <div class="header">
        <div class="container">

            <!--Navigation Bar-->
            <?php include("admin-main-navbar.php"); ?>

            </tbody>
            </table>
        </div>
    </div>
    <div class="small-container single-product">
        <h2 class="title">Admins</h2>
        <div class="row">
            <div class="p-col-2">
                <?php
                $stmt = $pdo->query("SELECT Admin_ID,FullName,Username, Pass FROM admin");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if (isset($_SESSION['Admin_ID'])) {
                    if (sizeof($row) > 0) {


                        echo ('<table class="tbl-madmin">' . "\n");
                        echo ('<thead class="tblhead-madmin">' . "\n");
                        echo ('<tr>
                            <th>Admin_ID</th>
                            <th>FullName</th>
                            <th>Username</th>
                            <th>Fucntion</th>
                        </tr>');
                        echo ('</thead>' . "\n");
                        echo ('</tbody>' . "\n");
                        $stmt = $pdo->query("SELECT Admin_ID,FullName,Username, Pass FROM admin");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo ('<tr><td>');
                            echo (htmlentities($row['Admin_ID']));
                            echo ('</td><td>');
                            echo (htmlentities($row['FullName']));
                            echo ('</td><td>');
                            echo (htmlentities($row['Username']));
                            echo ('</td><td>');
                            echo ('<a href="admin-edit.php?Admin_ID=' . $row['Admin_ID'] . '">Edit</a> / <a href="admin-delete.php?Admin_ID=' . $row['Admin_ID'] . '">Delete</a>');
                            echo ('</td></tr>' . "\n");
                        }
                    }
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <!-----footer ----->
    <?php include("footer-admin.php"); ?>

</body>

</html>