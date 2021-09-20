<?php

session_start();

if(!isset($_SESSION['username'])) {
  header('location:profile.php');
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $email = $fullname = $mobile = "";
$username_err = $email_err = $fullname_err = $mobile_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter an username.";
    } else{
        $username = $input_username;
    }

    // Validate email email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";
    } else{
        $email = $input_email;
    }

    // Validate mobile
    $input_mobile = trim($_POST["mobile"]);
    if(empty($input_mobile)){
        $mobile_err = "Please enter the mobile number.";
    } elseif(!ctype_digit($input_mobile)){
        $mobile_err = "Please enter a positive integer value.";
    } else{
        $mobile = $input_mobile;
    }

    // Validate fullname
    $input_fullname = trim($_POST["fullname"]);
    if(empty($input_fullname)){
        $fullname_err = "Please enter the fullname amount.";
    } else{
        $fullname = $input_fullname;
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($fullname_err) && empty($mobile_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET username=?, email=?, fullname=?, mobile=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_username, $param_email, $param_fullname, $param_mobile, $param_id);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_fullname = $fullname;
            $param_mobile = $mobile;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: profile.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $username = $row["username"];
                    $email = $row["email"];
                    $fullname = $row["fullname"];
                    $mobile = $row["mobile"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "script.php" ?>
    <style>
        
    </style>
</head>
<body>
    <?php include "navbar.php" ?>
    <div class="wrapper mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" class="form-control <?php echo (!empty($mobile_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile; ?>">
                            <span class="invalid-mobile"><?php echo $mobile_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullname; ?>">
                            <span class="invalid-feedback"><?php echo $fullname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <textarea name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"><?php echo $email; ?></textarea>
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="profile.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
