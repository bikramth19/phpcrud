

<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: #2e388b;">
    <a class="navbar-brand" href="#"> <img src="images/logo.jpg" alt="" height="38"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Employee</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="create.php">Add Employee</a>
                <a class="dropdown-item" href="index.php">List Employee</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User Details</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="profile.php">List User</a>
              </div>
            </li>
        </ul>

        <div class="float-right text-white">
            <i class="fa fa-user-circle-o fa-3"> </i> <a href="user_profile.php?id=<?php echo $_SESSION['userid']; ?>" class="text-danger text-capitalize">
                <?php echo $_SESSION['username']; ?>
            </a>
            | <a href="logout.php" class="text-white">Logout</a>
        </div>
    </div>
</nav>

