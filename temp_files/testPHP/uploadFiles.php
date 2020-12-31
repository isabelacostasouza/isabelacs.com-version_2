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
            
            <form action="uploadFiles.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group" style="text-align: center; margin-bottom: 30px;">
                    <h1>Upload a file</h1>
                </div>
                
                <div class="justify-content-center">
                    <div class="form-group row justify-content-center">
                        <input type="file" id="file" name="file" placeholder="File" class="btn" value="Choose File">
                    </div>
                </div>
                
<?php

$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$tmp = $_FILES['file']['tmp_name'];
$destination = 'uploads/'.$name;                
                
$missingFile = '<p><strong>Please enter a file!</strong></p>';            
$alreadyExists = '<p><strong>This file already exists!</strong></p>';            
$tooLarge= '<p><strong>This file is too large to be uploaded!</strong></p>';                       
$error = null;

if($_POST["submit"]){
    
    if($_FILES['file']['error']>0) {
        if($_FILES['file']['error'] == 4)
            $error = $missingFile;  
        else if(file_exists($destination))
            $error = $alreadyExists;  
        else if($size > 3*1024*1024)
            $error = $tooLarge;  
        else
            $error = '<p><strong>There was an error: '.$_FILES['file']['error'].'</strong></p>';
    }
    
    if($error)
        $resultMessage = '<div class="form-group row justify-content-center"><div class="alert alert-danger col-9" style="text-align: center; padding-top: 15px; padding-bottom: 0px; margin-top: 15px; margin-bottom: 0px;">' . $error .'</div></div>';   
    else {
        if(move_uploaded_file($tmp, $destination))
            $resultMessage = '<div class="form-group row justify-content-center"><div class="alert alert-success col-9" style="text-align: center; margin-top: 15px; margin-bottom: 0px;">Your file has been uploaded successfully!</div></div>';  
        else
            $resultMessage = '<div class="form-group row justify-content-center"><div class="alert alert-danger col-9" style="text-align: center; padding-top: 15px; padding-bottom: 0px; margin-top: 15px; margin-bottom: 0px;"><p><strong>Unable to upload file. Please try again later!</strong></p></div></div>'; 
    }
    echo $resultMessage;
    
}
                
?>
                
                <div class="justify-content-center">
                    <div class="form-group row justify-content-center">
                        <input type="submit" name="submit" class="btn btn-success col-8" style="margin-top: 20px" value="Upload File">
                    </div>
                </div>
                
            </form>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    
</html>