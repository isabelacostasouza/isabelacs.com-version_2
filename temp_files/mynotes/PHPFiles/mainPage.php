<?php    
session_start();

if(!isset($_SESSION['user_id'])){
    header("location: ../index.php");
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

    <link rel="stylesheet" type="text/css" href="../css/style.css?v=1">
    
    <style>
        #mainContent2 {
            border: 1px solid #0099ff;
            border-radius: 10px;
            padding: 40px 0px;
            margin: 100px 10%;
            background-color: rgb(255, 255, 255, 0.6);
        }
        #myNotes {
            height: 350px;
            overflow-y: auto;

        }
        @media (min-width: 950px){
            #mainContent2{
                margin: 100px 20%;
            }
        }
        @media (min-width: 1150px){
            #mainContent2{
                margin: 100px 25%;
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
                    <li style="cursor: pointer;"><a href=profilePage.php>Profile</a></li>
                    <li style="cursor: pointer;" class="active"><a href=mainPage.php>My Notes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li style="cursor: pointer;"><a id="logout" href="logout.php">Log out</a></li>
                </ul>
            </div>

        </div>
    </nav>
    
    <div id="mainContent2">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10">
                <div class="buttons">
                    <button id="addNote" type="button" class="btn btn-info btn-lg">Add Note</button>
                    <button id="aux" type="button" style="cursor: context-menu; background-color: white; border: none; color: white; font-size: 30px;">Aux</button>
                    <button id="editNote" type="button" class="btn btn-info btn-lg pull-right">Edit</button>
                    <button id="done" type="button" class="btn green btn-lg pull-right">Done</button>
                    <button id="allNotes" type="button" class="btn btn-info btn-lg">All Notes</button>
                </div>
                
                <div id="notepad">
                    <textarea rows="10"></textarea>
                </div>
                
                <div id="myNotes" class="col-12" style="margin-top: 25px;"></div>
                
            </div>
        </div>
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="../myNotes.js?v=1"></script>
</body>

</html>