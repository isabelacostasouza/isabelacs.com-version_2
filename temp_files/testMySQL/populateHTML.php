<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Get database information</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    
    <body>

        <div style="margin: 5%; border: 1px solid black; border-radius: 10px; padding: 30px;">

        <div class="form-group" style="text-align: center;">
            <h1>Get database information</h1>
        </div>
                
<?php
                 
$link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());
     
//$result = mysqli_query($link,"SELECT * FROM users WHERE firstname = 'Isabela'");      
//$result = mysqli_query($link,"SELECT * FROM users ORDER BY firstname"); 
//$result = mysqli_query($link,"SELECT * FROM users ORDER BY firstname DESC"); 
$result = mysqli_query($link,"SELECT * FROM users");

echo 
"<table style='margin-top: 60px; margin-bottom: 60px;' class='table'>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Password</th>
    </tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "</tr>";
}
            
echo "</table>";

mysqli_close($link);
            
?>
                
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    
</html>