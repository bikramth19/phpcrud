<!DOCTYPE html>
<html lang="en">
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
 <main>

  <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="images/lti.png" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            <form class="" action="user_register.php" method="post">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username"  class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="text" name="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Full Name</label>
              <input type="text" name="name"  class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" name="email"  class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Phone  Mobile Number</label>
              <input type="text" name="phone"  class="form-control" required>
            </div>
            <button type="submit" name="button" class="btn btn-info"> Register </button>
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
    </div>


  </main>
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
