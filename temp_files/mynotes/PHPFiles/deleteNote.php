<?php

session_start();

$link = mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

$note_id = $_POST['id'];
$sql = "DELETE FROM notes WHERE ID = $note_id";
$result = mysqli_query($link, $sql);

if(!$result){
    echo 'error';   
}

?>