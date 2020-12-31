<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Conect to database</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    
    <body>

        <div style="margin: 5%; border: 1px solid black; border-radius: 10px; padding: 30px;">
            
            <form action="index.php" method="post">
                <div class="form-group" style="text-align: center;">
                    <h1>MySQL</h1>
                </div>
                
                <div style="margin-top: 60px; margin-bottom: 30px; text-align: left;">
                    <h3>Connect to database</h3>
                    <?php
                    
                    //bd_isabela.mysql.dbaas.com.br

                    $link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());

                    echo "Connected successfully to database!";

                    mysqli_close($link);
                    
                    ?>
                </div>
                
                 <div style="margin-top: 30px; margin-bottom: 30px; text-align: left;">
                    <h3>Add table to Database</h3>
                    <?php
                    
                    //bd_isabela.mysql.dbaas.com.br

                    $link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());
                    
                    $sql = "CREATE TABLE users(ID INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL)";
                        
                    if(mysqli_query($link, $sql))
                        echo "Table created successfully!";
                    else 
                        echo 'ERROR: Unable to create table: '.mysqli_connect_error();

                    mysqli_close($link);
                    
                    ?>
                </div>

                
                <div style="margin-top: 30px; margin-bottom: 30px; text-align: left;">
                    <h3>Populate table in Database</h3>
                    <?php
                    
                    //bd_isabela.mysql.dbaas.com.br

                    $link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());
                    
                    $sql = "INSERT INTO users(firstname, lastname, email, password) VALUES ('Isabela', 'Costa', 'isabela.costasouza10@gmail.com', 'minhaSenha')";
                        
                    if(mysqli_query($link, $sql))
                        echo "New row added successfully!";
                    else 
                        echo 'ERROR: Unable to populate table';

                    mysqli_close($link);
                    
                    ?>
                </div>
                
                <div style="margin-top: 30px; margin-bottom: 30px; text-align: left;">
                    <h3>Update data</h3>
                    <?php
                    
                    //bd_isabela.mysql.dbaas.com.br

                    $link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());
                    
                    $sql = "UPDATE users SET lastname='Costa'";
                        
                    if(mysqli_query($link, $sql))
                        echo "Data updated successfully!";
                    else 
                        echo 'ERROR: Unable to update data';

                    mysqli_close($link);
                    
                    ?>
                </div>
                
                <div style="margin-top: 30px; margin-bottom: 30px; text-align: left;">
                    <h3>Delete data</h3>
                    <?php
                    
                    //bd_isabela.mysql.dbaas.com.br

                    $link = @mysqli_connect("bd_isabela.mysql.dbaas.com.br", "bd_isabela", "Mamaeisa10", "bd_isabela") or die('ERROR: Unable to connect: '.mysqli_connect_error());
                    
                    $sql = "DELETE FROM users";
                        
                    if(mysqli_query($link, $sql))
                        echo "Data deleted successfully!";
                    else 
                        echo 'ERROR: Unable to delete data';

                    mysqli_close($link);
                    
                    ?>
                </div>
            </form>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    
</html>