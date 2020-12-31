<?php

session_start();

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

$id = $_POST['id'];
$note = $_POST['note'];
$time = time();

$sql = "UPDATE notes SET note='$note', time = '$time' WHERE ID='$id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo 'error';   
}

?>