<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>

    <style>
      body{
        background: #b3e0ff; 
      }
      form{
        margin-top:200px;
        font-size:20px;
      }

      .login-button{
        font-size:20px;
        margin-top:10px;
        margin-bottom:0px;
      }
    </style>

</head>
<body>

<form method="POST" action="connect.php" id="form" autocomplete="off" >
<div class="login">

    <div class="login-form">
    <h3>Username:</h3>
    <input type="text" placeholder="Username" id="username" name="username" required><br>
    <h3>Password:</h3>
    <input type="password" placeholder="Password" id="password" name="password" required>
    <br>
    <input type="submit" value="Login" class="login-button" id="btn" />
    <br>
</div>
</div>
</form>

</body>
</html>
