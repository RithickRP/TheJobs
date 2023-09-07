<?php
require_once "../conn.php";
session_start();

if (isset($_POST['FullName']) && isset($_POST['Username'])) {
    if (strlen($_POST['FullName']) < 1 || strlen($_POST['Username']) < 1) {
        $_SESSION['error'] = 'All fields are required';
        header("Location: admin-edit.php");
        return;
    }

    $sql = "UPDATE admin SET FullName = :FullName,
            Username = :Username
            WHERE Admin_ID = :Admin_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        array(
            ':FullName' => $_POST['FullName'],
            ':Username' => $_POST['Username'],
            ':Admin_ID' => $_GET['Admin_ID']
        )
    );
    $_SESSION['success'] = 'Record updated';
    header('Location: manage-admin.php');
    return;
}

// Make sure that Admin_ID is present
if (!isset($_GET['Admin_ID'])) {
    $_SESSION['error'] = "Missing Admin_ID";
    header('Location: admin-edit.php');
    return;
}

$stmt = $pdo->prepare("SELECT * FROM admin where Admin_ID = :id");
$stmt->execute(array(":id" => $_GET['Admin_ID']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    $_SESSION['error'] = 'Bad value for Admin_ID';
    header('Location: admin-edit.php');
    return;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>GLITCH | Admin</title>
    <link href='images/glitch.svg' rel='icon' />
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <?php include("admin-main-navbar.php"); ?>

        </div>
    </div>
    <div class="small-container">
        <div class="row">
            <div class="form-box">
                <h2 class="title">Edit Admin</h2>
                <form method="post">
                    <p>FullName<input type="text" class="input-field" name="FullName" size="40"
                            value="<?php echo $row['FullName'] ?>" /></p>
                    <p>Username<input type="text" class="input-field" name="Username" size="40"
                            value="<?php echo $row['Username'] ?>" /></p>
                    <input type="hidden" name="Admin_ID" value="0">
                    <input type="submit" value="Save">
                    <input type="submit" name="cancel" value="Cancel">
                </form>
            </div>
        </div>
    </div>
    <?php include("footer-admin.php"); ?>

</body>

</html>