<?php

require_once "conn.php";


if (isset($_POST['Username']) && ($_POST['Pass']) && ($_POST['Email'])) {

  if (isset($_POST['Email']) == true && empty($_POST['Email']) == false) {
    //email validation
    $email = $_POST['Email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {

      $sql = "SELECT Username, Email FROM account WHERE Username=:Username AND Email=:Email";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(
        array(
          ':Username' => $_POST['Username'],
          ':Email' => $_POST['Email']

        )
      );
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($row === FALSE) {
        $fname = '';
        $lname = '';
        $phn = '';
        $uadd = '';

        $sql = "INSERT INTO account (Username, FirstName, LastName, UserAddress, Email, Pass, PhoneNumber) VALUES (:Username, :fname, :lanme, :uadd, :Email, :Pass, :phn)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
          array(

            ':Username' => $_POST['Username'],
            ':Pass' => $_POST['Pass'],
            ':Email' => $_POST['Email'],
            ":fname" => $fname,
            ":lanme" => $lname,
            ":phn" => $phn,
            ":uadd" => $uadd

          )
        );

        $_SESSION['Registered'] = 'Registration Successfull!';
        header('Location: log.php');
        return;

      } else {

        header('Location:re-reg.php');
        return;

      }
    }
  }
}