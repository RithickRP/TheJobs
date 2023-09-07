<?php
session_start();


if (!isset($_SESSION['Username'])) {
    die('ACCESS DENIED');
}
require_once "conn.php";

if (isset($_SESSION['Username'])) {
    $sql = "DELETE FROM account WHERE User_ID = :u";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':u' => $_SESSION['Username']));
    $_SESSION['success'] = 'Record deleted';
    header('Location:log.php');
    return;
}

if (!isset($_SESSION['User_ID'])) {
    $_SESSION['error'] = "Missing user_id";
    header('Location: litter.php');
    return;
}


?>