<?php


session_start();
if(isset($_SESSION['admin'])) {

  header("Location: index.php");
}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
        <h1>Login</h1>
    <form action="verify.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username">
        <div id="emailHelp" class="form-text">*Must be less than 30 charaters</div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>
