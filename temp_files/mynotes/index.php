<?php
    session_start();
    include('PHPFiles/connection.php');
    if(isset($_SESSION['user_id'])){
        header("location: PHPFiles/mainPage.php");
    }
?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Notes</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body data-spy="scroll" data-target="#mynavBar"> 

    <div id="mainContainer">
        <div class="jumbotron" id="home">
            <div class="content-fluid">
                <h1>Online Notes App</h1>
                <h2>Your Notes with you wherever you go</h2>
                <h2>Easy to use, protects all your notes</h2>
                <a type="button" id="signup" data-toggle="modal" data-target="#modalSignup" class="btn btn-default">SIGN UP</a>
                <br/>
                <a type="button" id="login" data-toggle="modal" data-target="#modalLogin" style="cursor: pointer;">LOGIN</a>
            </div>
        </div>
    </div>    

    <!-- Modal Sign up-->

    <form method="post" id="formSignup">
        <div class="modal fade" id="modalSignup" data-backdrop="static" role="dialog">
            <div class="modal-dialog" data-backdrop="static">
                <div class="modal-content" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sign Up</h4>
                    </div>
                    <div class="modal-body" style="padding: 15px;">

                        <div class="form-group">
                            <label for="inputFirstame">Firstname</label>
                            <input type="text" class="form-control" id="inputFirstame" name="firstname" placeholder="Firstname" value="<?php echo $_POST["firstname"];?>">
                        </div>

                        <div class="form-group">
                            <label for="inputLastname">Lastname</label>
                            <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="Lastname" value="<?php echo $_POST["lastname"];?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" value="<?php echo $_POST["username"];?>">
                        </div>

                        <div class="form-group">
                            <label for="inputMail">Email</label>
                            <input type="email" name="mail" class="form-control" id="inputMail" placeholder="Email" value="<?php echo $_POST["mail"];?>">
                        </div>

                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $_POST["password"];?>">
                        </div>

                        <div class="form-group">
                            <label for="inputPassword2">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" id="inputPassword2" placeholder="Confirm Password">
                        </div>
                        
                        <div id="signupmessage"></div>
                        
                        <div class="modal-footer" style="margin-top: 30px;">
                            <input type="submit" name="submitUP" class="btn btn-primary btn-lg" value="Sign Up">
                            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Modal Login-->
    
    <form method="post" id="formLogin">
        <div class="modal fade" id="modalLogin" data-backdrop="static" role="dialog">
            <div class="modal-dialog" data-backdrop="static">
                <div class="modal-content" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 15px;">

                            <div class="form-group">
                                <label for="inputEmailIN">Email</label>
                                <input type="email" class="form-control" id="inputEmailIN" name="email" placeholder="Email" value="<?php echo $_POST["email"];?>">
                            </div>

                            <div class="form-group">
                                <label for="inputPasswordIN">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPasswordIN" placeholder="Password">
                            </div>
                            
                            <div id="loginmessage"></div>

                            <div class="modal-footer" style="margin-top: 30px;">
                                <input type="submit" name="submitIN" class="btn btn-primary btn-lg" value="Sign In">
                                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Modal Signup sucess-->
    
    <form method="post" id="formSignupSucess">
        <div class="modal fade" id="welcomeModal" data-backdrop="static" role="dialog">
            <div class="modal-dialog" data-backdrop="static">
                <div class="modal-content" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sucess</h4>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 15px;">

                            <div class="form-group">
                                <div class="alert alert-success" style="text-align: center; font-weight: bold;">Your accont has been successfully created! Click on the button below to go to your main page</div>
                                <div style="text-align: center;">
                                    <a type="button" href="PHPFiles/mainPage.php" id="myNotesPage" name="myNotesPage" class="btn btn-default">My Notes</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="indexScript.js"></script>
</body>

</html>