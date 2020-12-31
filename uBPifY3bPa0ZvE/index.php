<?php
$value = 'www.devglan.com/online-tools/aes-encryption-decryption';

setcookie("CookieTeste", $value);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Bem-vindo</title>
  <link rel="stylesheet" href="./style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        $(document).ready(function(){
          $("button").click(function(){
              var user = document.getElementById("user").value;
              var password = document.getElementById("password").value;
              if(user == 'root')
                if(password == '0906201719092017')
                    alert("J9LKz0M5t+bW");
          });
        });

    </script>
    
</head>
<body>
    
<style>
    body{
        margin: 50px;
    }
</style>

<h2 style="display: none">Uma dica pra você: a senha é composta por 16 numeros, duas datas, tente acessar como root</h2>
    
<form>
    
  <div class="form-group">
    <label for="user">Usuario</label>
    <input class="form-control" id="user" placeholder="usuario">
  </div>
  <div class="form-group">
    <label for="password">Senha</label>
    <input type="password" class="form-control" id="password" placeholder="senha">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
  <h2 style="display: none">a chave é a senha (a ordem das 4 flags importa)</h2>
    
</form>
</body>

</html>