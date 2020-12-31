<?php

session_start();

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

$user_id = $_SESSION['user_id'];
$time = time();
$sql = "INSERT INTO notes (user_id, note, time) VALUES ('$user_id', '', '$time')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}else{
    echo mysqli_insert_id($link);   
}

?>