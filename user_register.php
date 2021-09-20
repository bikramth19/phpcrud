<?php

  session_start();
  // header('location:login.php');

  $con = mysqli_connect('localhost', 'root', 'admin' );

  mysqli_select_db($con, 'phpcrud');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];

  $s = " Select * from usertable where username = '$username'";

  $result = mysqli_query($con, $s);

  $num = mysqli_num_rows($result);

  if($num == 1) {
    echo "User already taken";
  }else {
    $sql = "INSERT INTO usertable (username, password, email, name, phone) VALUES ('$username', '$password', '$email', '$name', '$phone')";
    mysqli_query($con, $sql);

    echo "Successfully Registered <br>";
    print_r($username);

  }


?>
