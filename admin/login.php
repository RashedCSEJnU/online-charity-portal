<?php 
    include "inc/connection.php";
    
    ob_start();

    session_start();

    if(!empty($_SESSION['loginEmail'])){
        header('Location: dashboard.php');
    }

    if(isset($_POST['login'])){
        $email      = mysqli_real_escape_string($db,$_POST['email']);
        $password   = mysqli_real_escape_string($db,$_POST['password']);

        if(empty($email)){
            echo "<span class='alert alert-danger'>Email Feild Can't be Empty...</span>";
        }
        else if(empty($password)){
            echo "<span class='alert alert-danger'>Password Feild Can't be Empty...</span>";
        }
        else{
            $loginPassword = sha1($password);

            $loginQuery = "SELECT * FROM users WHERE email = '$email' ";
            $loginQueryFeedback = mysqli_query($db,$loginQuery);

            while($row = mysqli_fetch_assoc($loginQueryFeedback)){
                $_SESSION['loginUserId']        = $row['u_id'];
                $_SESSION['loginName']          = $row['name'];
                $_SESSION['loginEmail']         = $row['email'];
                $_SESSION['loginPhone']         = $row['phone'];
                $_SESSION['loginAddress']       = $row['address'];
                $_SESSION['loginBirthday']      = $row['birthday'];
                $_SESSION['loginGender']        = $row['gender'];
                $_SESSION['loginBiodata']       = $row['biodata'];
                $_SESSION['loginPhoto']         = $row['photo'];
                $_SESSION['loginPassword']      = $row['password'];
                $_SESSION['loginUserRole']      = $row['user_role'];
                $_SESSION['loginStatus']        = $row['status'];
            }

            if($email==$_SESSION['loginEmail'] && $loginPassword ==$_SESSION['loginPassword']){
                header('Location: dashboard.php');
            }
            else{
                echo '<span class="alert alert-danger">Invalid Username Or Password</span>';
                header('Location: login.php');
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

  <main>
    <form method = "POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                <div class="brand-wrapper">
                    <img src="assets/images/logo.svg" alt="logo" class="logo">
                </div>
                <div class="login-wrapper my-auto">
                    <h1 class="login-title">Log in</h1>
                    <form action="#!">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
                    </div>
                    <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Login">
                    </form>
                    <a href="#!" class="forgot-password-link">Forgot password?</a>
                    <p class="login-wrapper-footer-text">Don't have an account? <a href="registration.php" class="text-reset">Register here</a></p>
                </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="assets/images/login.jpg" alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </form>
  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <?php ob_end_flush(); ?>
</body>
</html>
