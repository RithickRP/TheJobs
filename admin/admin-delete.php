<?php
session_start();


if (!isset($_SESSION['Admin_ID'])) {
    die('ACCESS DENIED');
}
require_once "../conn.php";

if (isset($_POST['delete']) && isset($_POST['Admin_ID'])) {
    $sql = "DELETE FROM admin WHERE Admin_ID = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['Admin_ID']));
    $_SESSION['success'] = 'Record deleted';
    header('Location: manage-admin.php');
    return;
}

if (!isset($_GET['Admin_ID'])) {
    $_SESSION['error'] = "Missing user_id";
    header('Location: manage-admin.php');
    return;
}

$stmt = $pdo->prepare("SELECT Username, Admin_ID FROM admin where Admin_ID = :id");
$stmt->execute(array(":id" => $_GET['Admin_ID']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    $_SESSION['error'] = 'Bad value for Admin_ID';
    header('Location: manage_admin.php');
    return;
}

?>
<title>GLITCH | Admin</title>
<link href='images/glitch.svg' rel='icon' />
<p>Confirm: Deleting
    <?= htmlentities($row['Username']) ?>
</p>
<?php
if (isset($_SESSION['success'])) {
    echo ('<p style="color: green;">' . htmlentities($_SESSION['success']) . "</p>\n");
    unset($_SESSION['success']);
}
?>
<form method="post">
    <input type="hidden" name="Admin_ID" value="<?= $row['Admin_ID'] ?>">
    <input type="submit" value="Delete" name="delete">
    <a href="index.php">Cancel</a>
</form>