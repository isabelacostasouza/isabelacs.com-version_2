<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

//Get user input
$email = $_POST["email"];
$password = $_POST["password"];
$errors = null;
$emailValid = false;
$resultMessage = null;

//error messages
$missingEmail = '<p><strong>Please enter your email address!</strong></p>'; 
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>'; 
$emailDoesntExists = "<p><strong>This email address isn't registered!</strong></p>"; 
$missingPassword = '<p><strong>Please enter a password!</strong></p>'; 
$wrongPassword = '<p><strong>Wrong password. Try again!</strong></p>'; 

$link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

if(!$email)
    $errors .= $missingEmail;   
else {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        $errors .= $invalidEmail;
    
    $sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_e = mysqli_query($link, $sql_e);

  	if (mysqli_num_rows($res_e) <= 0)
        $errors .= $emailDoesntExists;  
    else 
        $emailValid = true;
}

if(!$password)
    $errors .= $missingPassword;    
else {
    $sql_e = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$res_e = mysqli_query($link, $sql_e);

  	if (mysqli_num_rows($res_e) <= 0 && $emailValid == true)
        $errors .= $wrongPassword;  
}

if($errors)
    $resultMessage = '<div class="alert alert-danger" style="text-align: center; margin-top: 30px;">' . $errors .'</div>';   
else {    
    $sql_a = "SELECT * FROM users WHERE email='$email'";
    $res_a = mysqli_query($link, $sql_a);
    $row = $res_a->fetch_assoc();
    
    $_SESSION['user_id'] = $row['ID'];
    $_SESSION['username'] = $_POST["username"];
    $_SESSION['email'] = $_POST["email"];

    mysqli_close($link);      
}

if($resultMessage)
    echo $resultMessage;
else {
    $newPage = "<script>window.open('PHPFiles/mainPage.php', '_self')</script>";
    echo $newPage;
}

?>