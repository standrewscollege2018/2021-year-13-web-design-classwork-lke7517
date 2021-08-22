<?php
  session_start();

  include("dbconnect.php");

  $username = $_POST['username'];
  $password = $_POST['password'];

  $user_sql = "SELECT * FROM user WHERE username='$username'";
  $user_qry = mysqli_query($dbconnect,$user_sql);

  //check if there are any records with that username
  if (mysqli_num_rows($user_qry)==0) {
    //no records match this username, so redirect back to login page
    header("location:index.php?page=login&error=user");
  } else {
    //we have a match
    //lets check the password match
    $user_aa = mysqli_fetch_assoc($user_qry);

    $hash_password = $user_aa['password'];
    //Check if any passwords match
    if (password_verify($password, $hash_password)) {
     $_SESSION['admin'] = $username;
     //redirecting to admin panel
     header("location: index.php");
   }else {
     //password didnt match. redirecting to loginpage
     header("location:index.php?page=login&error=fail");
   }
  }
?>
