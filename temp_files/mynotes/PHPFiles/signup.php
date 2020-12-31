<?php

session_start();

//Get user input
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$email = $_POST["mail"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$errors = null;
$resultMessage = null;

//error messages
$missingFirstname = '<p><strong>Please enter your firstname!</strong></p>';
$missingLastname = '<p><strong>Please enter your lastname!</strong></p>'; 
$missingUsername = '<p><strong>Please enter your username!</strong></p>';
$usernameExists = "<p><strong>This username already exists!</strong></p>"; 
$missingEmail = '<p><strong>Please enter your email address!</strong></p>'; 
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>'; 
$emailExists = "<p><strong>This email address already exists!</strong></p>"; 
$missingPassword = '<p><strong>Please enter a password!</strong></p>'; 
$passwordsDontMatch = "<p><strong>The passwords don't match!</strong></p>"; 

$link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

if(!$firstname)
    $errors .= $missingFirstname;  
else
    $firstname = filter_var($firstname,FILTER_SANITIZE_STRING); 

if(!$lastname)
    $errors .= $missingLastname;  
else
    $lastname = filter_var($lastname,FILTER_SANITIZE_STRING);   

if(!$username)
    $errors .= $missingUsername;   
else {
    $sql_u = "SELECT * FROM users WHERE username='$username'";
  	$res_u = mysqli_query($link, $sql_u);

  	if (mysqli_num_rows($res_u) > 0)
        $errors .= $usernameExists;  
}

if(!$email)
    $errors .= $missingEmail;   
else {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        $errors .= $invalidEmail;
    
    $sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_e = mysqli_query($link, $sql_e);

  	if (mysqli_num_rows($res_e) > 0)
        $errors .= $emailExists;  
}

if(!$password || !$password2)
    $errors .= $missingPassword;    
else
    if($password != $password2) 
       $errors .= $passwordsDontMatch;    

if($errors)
    $resultMessage = '<div class="alert alert-danger" style="text-align: center; margin-top: 30px;">' . $errors .'</div>';   
else {    
    $sql = "INSERT INTO users(firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
    
    if(mysqli_query($link, $sql)) {

    }
    else 
        $resultMessage = '<div class="alert alert-danger" style="text-align: center; font-weight: bold;">ERROR: Unable to register user, try again later!</div>';  
}
  
$sql_a = "SELECT * FROM users WHERE email='$email'";
$res_a = mysqli_query($link, $sql_a);
$row = $res_a->fetch_assoc();

$_SESSION['user_id'] = $row['ID'];

mysqli_close($link);      

if($resultMessage)
    echo $resultMessage;
else {
    $newPage = "<script>
    $('#modalSignup').modal('hide');
    $('#welcomeModal').modal();
        </script>";
    echo $newPage;
}

?>