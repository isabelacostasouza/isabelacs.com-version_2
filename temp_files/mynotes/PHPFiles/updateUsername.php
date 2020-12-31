<?php

session_start();

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

$user_id = $_SESSION['user_id'];

$sql_a = "SELECT * FROM users WHERE ID='$user_id'";
$res_a = mysqli_query($link, $sql_a);
$row = $res_a->fetch_assoc();
$myUser = $row['username'];

$newUser = $_POST['username'];
$errors = null;

$missingUser = '<p>Please, enter your new username!</p>';
$userExists = '<p>This username is already registered!</p>';

if(!$newUser)
    $errors .= $missingUser;
else {
    $sql_e = "SELECT * FROM users WHERE username='$newUser'";
  	$res_e = mysqli_query($link, $sql_e);

  	if (mysqli_num_rows($res_e) > 0)
        $errors .= $userExists;  
    else {
        $sql = "UPDATE users SET username='$newUser' WHERE username = '$myUser'";
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
    $_SESSION['username'] = $newUser;
    $newPage = "<script>window.open('profilePage.php', '_self')</script>";
    echo $newPage;
}


?>