<?php 
    include "inc/header.php"; 
    ob_start();
    if(!empty($_SESSION['loginEmail'])){
        header('Location: index.php');
    }
?>


<?php
    //ob_start();

    //session_start();


// code for updating verification status on database (0->1) if link was clicked
$msg = "";
$Error_Pass = "";
if (isset($_GET['Verification'])) {
  $raquet = mysqli_query($db, "SELECT * FROM users WHERE CodeV='{$_GET['Verification']}'");
  if (mysqli_num_rows($raquet) > 0) {
    $query = mysqli_query($db, "UPDATE users SET verification='1' WHERE CodeV='{$_GET['Verification']}'");
    if ($query) {
      $rowv = mysqli_fetch_assoc($raquet);
      header("Location: login.php?id='{$rowv['id']}'");
    }else{
      header("Location: registration.php");
    }
  } else {
    header("Location: registration.php");
  }
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

            // $loginQuery = "SELECT * FROM users WHERE email='{$email}' and password='{$loginPassword}'";
            // $loginQueryFeedback = mysqli_query($db,$loginQuery);

            // while($row = mysqli_fetch_assoc($loginQueryFeedback)){
            //     $_SESSION['loginUserId']        = $row['u_id'];
            //     $_SESSION['loginName']          = $row['name'];
            //     $_SESSION['loginEmail']         = $row['email'];
            //     $_SESSION['loginPhone']         = $row['phone'];
            //     $_SESSION['loginAddress']       = $row['address'];
            //     $_SESSION['loginBirthday']      = $row['birthday'];
            //     $_SESSION['loginGender']        = $row['gender'];
            //     $_SESSION['loginBiodata']       = $row['biodata'];
            //     $_SESSION['loginPhoto']         = $row['photo'];
            //     $_SESSION['loginPassword']      = $row['password'];
            //     $_SESSION['loginUserRole']      = $row['user_role'];
            //     $_SESSION['loginStatus']        = $row['status'];
            //     $code = $row['CodeV'];
            //     $verification        = $row['verification'];
            // }

            // //echo '<span class= "alert alert-danger">$_SESSION['loginEmail']</span>';
	
            // if($verification===1){
            //     if($_SESSION['loginUserRole']==1 || $_SESSION['loginUserRole']==2){
            //         header('Location: ../admin/dashboard.php');
            //     }
            //     else{
            //         header('Location: index.php');
            //     }
            // }
            // else{
            //     echo '<span class="alert alert-danger">Invalid Username Or Password</span>';
            //     header('Location: login.php');
            // }

            

            // Code for Log in
            if (isset($_POST['login'])) {
                $email = mysqli_real_escape_string($db, $_POST['email']);
                $Pass = mysqli_real_escape_string($db, sha1($_POST['password']));
                $sql = "SELECT * FROM users WHERE email='{$email}' and password='{$Pass}'";
                $resulte = mysqli_query($db, $sql);
                if (mysqli_num_rows($resulte) === 1) {
                $row = mysqli_fetch_assoc($resulte);
                if ($row['verification'] === '1') {
                    $_SESSION['loginUserId']        = $row['u_id'];
                    $_SESSION['loginName']          = $row['name'];
                    $_SESSION['loginEmail']         =$email;
                    $_SESSION['loginUserRole']      = $row['user_role'];
                    $_SESSION['loginPhoto']         = $row['photo'];
                    $_SESSION['loginStatus']        = $row['status'];

                         if($_SESSION['loginUserRole']==1 || $_SESSION['loginUserRole']==2){
                            header('Location: ../admin/dashboard.php');
                        }
                        else{
                            header('Location: index.php');
                        }
                }else{$msg = "<div class='alert alert-info'>First Verify Your Account</div>";}
                }else{
                    $msg = "<div class='alert alert-danger'>Email or Password is not match</div>";
                }
            }
        }
    }
?>

<head>
    <!-- volunteer css -->

    <link rel="stylesheet" type="text/css" href="css/volunteer.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>


<body>

    <div class="container mt-5 card p-5" style="-webkit-box-shadow: 1px 0px 20px 1px rgba(0,0,0,0.81);
-moz-box-shadow: 1px 0px 20px 1px rgba(0,0,0,0.81);
box-shadow: 1px 0px 20px 1px rgba(0,0,0,0.81);">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center mb-4">Sign In</h2>
                <form method="POST">


                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>


                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block mt-4" name="login">Submit</button>

                </form>

                <div class="col-md-12 d-flex">
                    <div class="col-md-6">
                        <p class="login-wrapper-footer-text mt-3">Don't have an account? <a href="registration.php"
                                class="text-reset" style="text-decoration: none;"><strong style="font-weight:700"
                                    class="text-primary">Register here</strong></a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="login-wrapper-footer-text mt-3"><a href="forget.php" class="text-reset"
                                style="text-decoration: none;">Reset your password-><strong style="font-weight:700"
                                    class="text-info">Forget
                                    Password</strong></a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

<?php include "inc/footer.php"; ?>