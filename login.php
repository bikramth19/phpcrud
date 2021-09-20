<?php  
 $connect = mysqli_connect("localhost", "root", "admin", "phpcrud");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:index.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if( empty($_POST["username"]) && empty($_POST["password"])  && empty($_POST["email"])  && empty($_POST["fullname"]) && empty($_POST["mobile"]) && empty($_POST["file"]) )
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);
           $password = mysqli_real_escape_string($connect, $_POST["password"]);
           $email = mysqli_real_escape_string($connect, $_POST["email"]);
           $fullname = mysqli_real_escape_string($connect, $_POST["fullname"]);
           $mobile = mysqli_real_escape_string($connect, $_POST["mobile"]);
           $file = mysqli_real_escape_string($connect, $_POST["file"]);
           $password = md5($password);
           
           $query = "INSERT INTO users (username, password, email, fullname, mobile, file) VALUES('$username', '$password', '$email', '$fullname', '$mobile', '$file')";
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';
           }  
      }  
 }  

 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]) )
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);

           $password = md5($password);  
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";  

           $logMsg = "Subscription; username: " . $username . PHP_EOL;
           error_log($logMsg, 3, 'server.log');
           

           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:index.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LTI Employee - Login Page</title>
        <link rel="stylesheet" href="custom.css">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      </head>  
      <body class="login_page">
           <div class="container-fluid">  
                <?php  
                if(isset($_GET["action"]) == "register")
                {  
                ?>
               <div class="row">
                    <div class="col-sm-6 login-section-wrapper">
                         <div class="brand-wrapper">
                         <img src="images/lti.png" alt="logo" class="logo">
                         </div>
                         <div class="login-wrapper my-auto">
                         <h1 class="login-title">Register</h1>
                         <form method="post">  
                              <label>Enter Username</label>  
                              <input type="text" name="username" class="form-control" />  
                              <label>Enter Password</label>  
                              <input type="password" name="password" class="form-control" />  
                              <label>Full Name</label>  
                              <input type="text" name="fullname" class="form-control" /> 
                              <label>Enter Email</label>  
                              <input type="text" name="email" class="form-control" /> 
                              <label>Enter Mobile</label>  
                              <input type="text" name="mobile" class="form-control" /> 
                              <label>Upload Profile Picture</label>
                              <input type='file' name='file'>
                              <br/>
                              <input type="submit" name="register" value="Register" class="btn btn-info mt-4" /> 
                         </form>  
                         <br>
                         <p class="login-wrapper-footer-text">Don't have an account? <a href="login.php" class="text-reset">Login here</a></p>
                         </div>
                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block">
                         <img src="images/login.jpg" alt="login image" class="login-img">
                         <p class="text-white font-weight-medium text-center flex-grow align-self-end footer-link">
                         Copyright &copy; 2021 LTI. All rights reserved.
                         </p>
                    </div>
               </div>      
                <?php       
                }  
                else  
                {  
                ?>
                <div class="row">
                    <div class="col-sm-6 login-section-wrapper">
                        <div class="brand-wrapper">
                            <img src="images/lti.png" alt="logo" class="logo">
                        </div>
                        <div class="login-wrapper my-auto">
                            <h1 class="login-title">Log in</h1>
                            <form method="post">  
                                <label>Enter Username</label>  
                                <input type="text" name="username" class="form-control" />  
                                <br />  
                                <label>Enter Password</label>  
                                <input type="password" name="password" class="form-control" />  
                                <br />                        
                                <input type="submit" name="login" value="Login" class="btn btn-info" /> 
                            </form>
                            <br>
                            <p class="login-wrapper-footer-text">Don't have an account? <a href="login.php?action=register" class="text-reset">Register here</a></p>
                        </div>
                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="images/login.jpg" alt="login image" class="login-img">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end footer-link">
                        Copyright &copy; 2021 LTI. All rights reserved.
                    </p>
                    </div>
                </div>  
                
                
                <?php  
                }  
                ?>  
           </div>  

        
<style type="text/css">
  .login-section-wrapper {
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    padding: 68px 100px;
    background-color: #fff;
  }
</style>
      </body>  
 </html>