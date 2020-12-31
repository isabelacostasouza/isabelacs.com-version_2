<?php

session_start();

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM notes WHERE note=''";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
}
$sql = "SELECT * FROM notes WHERE user_id ='$user_id' ORDER BY time DESC";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $note_id = $row['ID'];
            $note = $row['note'];
            $time = $row['time'];
            $time = date("F d, Y h:i:s A", $time);
            
            echo "
        <div class='note' style='border: 1px solid grey; border-radius: 10px; padding: 20px; margin-bottom: 10px; background-color: rgb(255, 255, 255, 0.9); cursor: context-menu;'>
            <div class='col-xs-5 col-sm-3 delete' style='display: none; margin-top: 5px;'>
                <button class='btn-lg btn-danger' style='width:100%'>delete</button>
            </div>
            <div class='noteheader' id='$note_id' style=' cursor: pointer;'>
                <div class='text' style='font-weight: bold; font-size: 25px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;'>$note</div>
                <div class='timetext'>$time</div>    
            </div>
        </div>";
        }
    }else{
        echo '<div class="alert alert-danger" style="text-align: center; font-weight: bold; padding: 30px 0px; font-size: 17px;">You have not created any notes yet!</div>'; exit;
    }
    
}else{
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
}

?>