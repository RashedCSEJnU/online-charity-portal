<?php 

    include "inc/connection.php";
    ob_start();
    session_start();
    if(!empty($_SESSION['loginEmail'])){
        header('Location: dashboard.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>
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
                        <h1 class="login-title">Sign Up</h1>
                        <form action="#!">
                            <div class="form-group mb-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
                            </div>

                            <div class="form-group mb-4">
                                <label for="c_password">Confirm Password</label>
                                <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirm your passsword">
                            </div>

                        <input name="signUp" id="signUp" class="btn btn-block login-btn" type="submit" value="Sign Up">
                        </form>
                        <a href="#!" class="forgot-password-link">Forgot password?</a>
                        <p class="login-wrapper-footer-text">Already have an account? <a href="login.php" class="text-reset">Sign In here</a></p>
                    </div>
                </div>

                    <div class="col-sm-6 px-0 d-none d-sm-block">
                        <img src="assets/images/login.jpg" alt="login image" class="login-img">
                    </div>
            </div>
        </div>
    </form>

    <?php 
    
    
        if(isset($_POST['signUp'])){
            $name       = mysqli_real_escape_string($db,$_POST['name']);
            $email      = mysqli_real_escape_string($db,$_POST['email']);
            $password   = mysqli_real_escape_string($db,$_POST['password']);
            $c_password = mysqli_real_escape_string($db,$_POST['c_password']);

            if($password==$c_password){
                $hashPassword = sha1($password);

                $regQuery = "INSERT INTO users (name, email, password) VALUES('$name','$email','$hashPassword')";
                $regQueryFeedback = mysqli_query($db,$regQuery);
                if($regQueryFeedback){
                    header('Location: login.php');
                }
                else{
                    die('Sign Up Error!'.mysqli_error($db));
                }


            }
            else{
                echo '<span class="alert alert-danger">Password not matched!</span>';
            }
        }
        
    ?>

  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <?php ob_end_flush(); ?>

</body>
</html>
