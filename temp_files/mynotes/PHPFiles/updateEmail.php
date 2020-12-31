<?php

session_start();

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

$user_id = $_SESSION['user_id'];
$newemail = $_POST['email'];
$errors = null;

$missingEmail = '<p>Please, enter your new email!</p>';
$emailExists = '<p>This email is already registered!</p>';

if(!$newemail)
    $errors .= $missingEmail;
else {
    $sql_e = "SELECT * FROM users WHERE email='$newemail'";
  	$res_e = mysqli_query($link, $sql_e);

  	if (mysqli_num_rows($res_e) > 0)
        $errors .= $emailExists;  
    else {
        $sql = "UPDATE users SET email='$newemail' WHERE ID = '$user_id'";
        $result = mysqli_query($link, $sql);

        if(!$result) {
            echo "<div class='alert alert-danger'>There was an error inserting the user details in the database.</div>";
            exit;
        }
    }
}

if($errors) {
    $resultMessage = '<div class="alert alert-danger" style="text-align: center; margin-top: 30px; font-weight: bold;">' . $errors .'</div>';   
    echo $resultMessage;
}

else {
    $_SESSION['email'] = $newemail;
    $newPage = "<script>window.open('profilePage.php', '_self')</script>";
    echo $newPage;
}


?>