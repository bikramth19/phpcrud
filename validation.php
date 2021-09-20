<?php

  session_start();

  $con = mysqli_connect('localhost', 'root', 'admin' );

  mysqli_select_db($con, 'phpcrud');

  $username = $_POST['username'];
  $password = $_POST['password'];
  // $password = md5($password);

  $s = " Select * from usertable where username = '$username' && password = '$password'";

  $result = mysqli_query($con, $s);


  

  $num = mysqli_num_rows($result);

  if($num == 1) {
    $row = mysqli_fetch_assoc($result);
    $name1 = $row["userid"]; 
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $name1;
    header('location:index.php');
  }else {
    header("location: error.php");
    exit();
  }


?>