<?php
  session_start();
  include("../config/db.php");

  $username = mysqli_real_escape_string($conn, trim($_POST['username'])); //this will prevent sql injection
  $password = mysqli_real_escape_string($conn, trim($_POST['password']));

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if(mysqli_num_rows($result) == 1){
    $_SESSION['user'] = $username;
    header("Location: ../dashboard.php");
  }else{
    $_SESSION['message'] = "Invalid username or password";
    $_SESSION['type'] = "error";
    header("Location: ../index.php");
    exit();
  }
?>