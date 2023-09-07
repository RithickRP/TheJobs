<?php

session_start();
require_once "../conn.php";

if (isset($_SESSION['Admin_ID'])) {

    if (isset($_POST['Regist_ID']) && isset($_POST['DateOfApp']) && isset($_POST['TimeOfApp'])) {
        $app = 'Approved';
        // $doa = date('Y-m-d' , strtotime($_POST['dateofappointment']));
        $stmt = $pdo->prepare("UPDATE registration SET Reg_Status=:s, DateOfApp=:d, TimeOfApp=:t WHERE Regist_ID=:reid");
        $stmt->execute(
            array(
                ":reid" => $_POST['Regist_ID'],
                ":d" => $_POST['DateOfApp'],
                ":t" => $_POST['TimeOfApp'],
                ":s" => $app
            )
        );
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        header('Location:appoint-admin.php');
        return;
    } else {

        echo ('<p>Error</p>');

    }

}