<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("location: ../index.php");
}

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());
include('connection.php');

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE ID='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result); 
    $username = $row['username'];
    $email = $row['email'];
}else{
    echo "There was an error retrieving the username and email from the database";   
}

?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Notes</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <style>
        #mainContent3 {
            margin-top: 100px;
            padding: 35px;
            background-color: rgb(255, 255, 255, 0.7);
            border: 1px solid #0099ff;
            border-radius: 15px;
            margin-left: 20%;
            margin-right: 20%;
            font-size: 20px;
        }
        
        @media (max-width: 750px) {
            #mainContent3 {
                padding: 9px;
                font-size: 18px;
            }
        }

    </style>
</head>

<body> 

    <nav role="navigation" class="navbar navbar-inverse" style="border-radius: 0px;">
        <div class="content-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" style="cursor: context-menu;">Online Notes</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>  
                </button>
            </div>

            <div class="navbar-collapse collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-left">
                    <li style="cursor: pointer;" class="active"><a href=profilePage.php>Profile</a></li>
                    <li style="cursor: pointer;"><a href=mainPage.php>My Notes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li style="cursor: pointer;" id="logout"><a href="logout.php">Log out</a></li>
                </ul>
            </div>

        </div>
    </nav>
    
    <div id="mainContent3">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10 col-lg-offset-3 col-lg-6">
                <h2 style="margin-bottom: 40px; text-align: center; font-size: 40px;">Account settings</h2>
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr style="cursor: pointer;" data-target="#modalUpdateUser" data-toggle="modal">
                        <td>Username</td>
                        <td><?php echo $username; ?></td>
                    </tr>
                    <tr style="cursor: pointer;" data-target="#modalUpdateEmail" data-toggle="modal">
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr style="cursor: pointer;" data-target="#modalUpdatePassword" data-toggle="modal">
                        <td>Password</td>
                        <td>hidden</td>
                    </tr>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Modal update username-->

    <form method="post" id="updateUsername">
        <div class="modal fade" id="modalUpdateUser" data-backdrop="static" role="dialog">
            <div class="modal-dialog" data-backdrop="static">
                <div class="modal-content" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update username</h4>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 15px;">

                            <div class="form-group">
                                <label for="inputUsername">New Username</label>
                                <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" value="">
                            </div>
                            
                            <div id="updateErrors1"></div>

                            <div class="modal-footer" style="margin-top: 30px;">
                                <input type="submit" name="username" class="btn btn-primary" value="Save">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Modal update email-->

    <form method="post" id="updateEmail">
        <div class="modal fade" id="modalUpdateEmail" data-backdrop="static" role="dialog">
            <div class="modal-dialog" data-backdrop="static">
                <div class="modal-content" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update email</h4>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 15px;">

                            <div class="form-group">
                                <label for="inputEmail">New Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="">
                            </div>
                            
                            <div id="updateErrors2"></div>

                            <div class="modal-footer" style="margin-top: 30px;">
                                <input type="submit" name="email" class="btn btn-primary" value="Save">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Modal update password-->

    <form method="post" id="updatePassword">
        <div class="modal fade" id="modalUpdatePassword" data-backdrop="static" role="dialog">
            <div class="modal-dialog" data-backdrop="static">
                <div class="modal-content" data-backdrop="static">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update password</h4>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 15px;">

                            <div class="form-group">
                                <label for="inputMyPassword">Current Password</label>
                                <input type="password" class="form-control" id="inputMyPassword" name="myPassword" placeholder="Current Password" value="">
                            </div>
                            
                            <div class="form-group">
                                <label for="inputNewPassword">New Password</label>
                                <input type="password" class="form-control" id="inputNewPassword" name="newPassword" placeholder="New Password" value="">
                            </div>
                            
                            <div class="form-group">
                                <label for="inputNewPassword2">Confirm Password</label>
                                <input type="password" class="form-control" id="inputNewPassword2" name="newPassword2" placeholder="Confirm Password" value="">
                            </div>
                            
                            <div id="updateErrors3"></div>

                            <div class="modal-footer" style="margin-top: 30px;">
                                <input type="submit" name="updatePassword" class="btn btn-primary" value="Save">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="../profile.js?v1"></script>
</body>

</html>