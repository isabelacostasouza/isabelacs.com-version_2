<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Contact Form</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    
    <body>

        <div style="margin: 5%; border: 1px solid black; border-radius: 10px; padding: 30px;">
            
            <form action="contact.php" method="post">
                <div class="form-group" style="text-align: center;">
                    <h1>Contact Us</h1>
                </div>
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="<?php echo $_POST["name"];?>">
                </div>

                <div class="form-group">
                    <label for="inputMail">Name</label>
                    <input type="email" name="mail" class="form-control" id="inputMail" placeholder="Email" value="<?php echo $_POST["mail"];?>">
                </div>

                <div class="form-group">
                    <label for="inputMessage">Message</label>
                    <textarea class="form-control" id="inputMessage" name="message" rows="3"><?php echo $_POST["message"];?></textarea>
                </div>
                
<?php

//Get user input
$name = $_POST["name"];
$email = $_POST["mail"];
$message = $_POST["message"];

//error messages
$missingName = '<p><strong>Please enter your name!</strong></p>'; 
$missingEmail = '<p><strong>Please enter your email address!</strong></p>'; 
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>'; 
$missingMessage = '<p><strong>Please enter a message!</strong></p>'; 

//if the user has submitted the form
if($_POST["submit"]){
    //check for errors
    if(!$name){
        $errors .= $missingName;  
    }else{
        $name = filter_var($name,FILTER_SANITIZE_STRING);   
    }
    if(!$email){
        $errors .= $missingEmail;   
    }else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors .=$invalidEmail;   
        }
    }
    if(!$message){
        $errors .= $missingMessage;
    }else{
        $message = filter_var($message, FILTER_SANITIZE_STRING);   
    }
 
        //if there are any errors
    if($errors){
        //print error message
        $resultMessage = '<div class="alert alert-danger" style="text-align: center; padding-top: 30px; margin-top: 20px;">' . $errors .'</div>';   
    }else{
        $to = "sam@hellodevelopers.890m.com";
        $subject = "Contact";
        $message = "
        <p>Name: $name.</p>
        <p>Email: $email.</p>
        <p>Message:</p>
        <p><strong>$message</strong></p>"; 
        $headers = "Content-type: text/html";
        if(mail($to, $subject, $message, $headers)){
            $resultMessage = '<div class="alert alert-success" style="text-align: center;">Thanks for your message. We will get back to you as soon as possible!</div>';  
        }else{
            $resultMessage = '<div class="alert alert-warning" style="text-align: center;">Unable to send Email. Please try again later!</div>';  
        }
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