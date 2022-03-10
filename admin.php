<?php 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin</title>
    <style>
     form{
       width: 70%;
       margin: auto;
     }
     
    </style>
</head>
<body>
  <form action="handle_admin.php" method="post">
  <div class="form-group">
    <label for="Input_user">Username</label>
    <input type="text" class="form-control" id="Input_user"  placeholder=" Username" name="username">
  </div>
  <div class="form-group">
    <label for="Input_password">Password</label>
    <input type="password" class="form-control" id="Input_password" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>