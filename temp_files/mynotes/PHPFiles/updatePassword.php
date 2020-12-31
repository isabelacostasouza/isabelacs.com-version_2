<?php

session_start();

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

$user_id = $_SESSION['user_id'];
$myPassword = $_POST['myPassword'];
$newPassword = $_POST['newPassword'];
$newPassword2 = $_POST['newPassword2'];
$actualPassword = null;
$errors = null;

$missingCurrentPassword = '<p>Please, enter your current password!</p>';
$missingNewPassword1 = '<p>Please, enter your new password!</p>';
$missingNewPassword2 = '<p>Please, confirm your new password!</p>';
$wrongPassword = '<p>Wrong current password. Try again!</p>';
$PasswordsDontMatch = "<p>The new password doesn't match the confirmation password. Try again!</p>";

$sql_a = "SELECT * FROM users WHERE ID='$user_id'";
$res_a = mysqli_query($link, $sql_a);
$row = $res_a->fetch_assoc();
$actualPassword = $row['password'];

if(!$myPassword)
    $errors .= $missingCurrentPassword;

else if(!$newPassword)
    $errors .= $missingNewPassword1;

else if(!$newPassword2)
    $errors .= $missingNewPassword2;
      
else {
    if($myPassword != $actualPassword)
        $errors .= $wrongPassword;

    else if($newPassword != $newPassword2)
        $errors .= $PasswordsDontMatch;

    else {
        $sql = "UPDATE users SET password='$newPassword' WHERE ID = '$user_id'";
        $result = mysqli_query($link, $sql);
    }
}

if($errors){
    $resultMessage = '<div class="alert alert-danger" style="text-align: center; margin-top: 30px; font-weight: bold;">' . $errors .'</div>';   
    echo $resultMessage;
}
else {
    $newPage = "<script>window.open('profilePage.php', '_self')</script>";
    echo $newPage;
}

?>