<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Upload Form to Database</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    
    <body>

        <div style="margin: 5%; border: 1px solid black; border-radius: 10px; padding: 30px;">
            
            <form action="formconnection.php" method="post">
                <div class="form-group" style="text-align: center;">
                    <h1>Sign up</h1>
                </div>
                
                <div class="form-group">
                    <label for="inputFirstame">Firstname</label>
                    <input type="text" class="form-control" id="inputFirstame" name="firstname" placeholder="Firstname" value="<?php echo $_POST["firstname"];?>">
                </div>
                
                <div class="form-group">
                    <label for="inputLastname">Lastame</label>
                    <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="Lastname" value="<?php echo $_POST["lastname"];?>">
                </div>

                <div class="form-group">
                    <label for="inputMail">Email</label>
                    <input type="email" name="mail" class="form-control" id="inputMail" placeholder="Email" value="<?php echo $_POST["mail"];?>">
                </div>
                
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $_POST["password"];?>">
                </div>

                
<?php

//Get user input
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["mail"];
$password = $_POST["password"];

//error messages
$missingFirstname = '<p><strong>Please enter your firstname!</strong></p>';
$missingLastname = '<p><strong>Please enter your lastname!</strong></p>'; 
$missingEmail = '<p><strong>Please enter your email address!</strong></p>'; 
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>'; 
$missingPassword = '<p><strong>Please enter a password!</strong></p>'; 

if($_POST["submit"]){
    if(!$firstname)
        $errors .= $missingFirstname;  
    else
        $firstname = filter_var($firstname,FILTER_SANITIZE_STRING); 
    
    if(!$lastname)
        $errors .= $missingLastname;  
    else
        $lastname = filter_var($lastname,FILTER_SANITIZE_STRING);   
    
    if(!$email)
        $errors .= $missingEmail;   
    else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            $errors .=$invalidEmail;   
    }
    
    if(!$password)
        $errors .= $missingPassword;    
        
    if($errors)
        $resultMessage = '<div class="alert alert-danger" style="text-align: center; padding-top: 30px; margin-top: 20px;">' . $errors .'</div>';   
    else {
      
        $link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

        $sql = "INSERT INTO users(firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";

        if(mysqli_query($link, $sql))
            $resultMessage = '<div class="alert alert-success" style="text-align: center;">Success!</div>';  
        else 
            $resultMessage = '<div class="alert alert-success" style="text-align: center;">ERROR: Unable to register user, try again later!</div>';  

        mysqli_close($link);      
    }
    echo $resultMessage;
}
?>
                
                <div class="justify-content-center">
                    <div class="form-group row justify-content-center">
                        <input type="submit" name="submit" class="btn btn-success col-8" style="margin-top: 10px" value="Send Message">
                    </div>
                </div>
            </form>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    
</html>