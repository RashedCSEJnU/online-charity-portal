<?php 
    include "inc/header.php"; 
    ob_start();
    if(!empty($_SESSION['loginEmail'])){
        header('Location: index.php');
    }

$msg = "";
$error = "";
if (isset($_GET['Reset'])) {
    if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM users WHERE CodeV='{$_GET['Reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $Pass = mysqli_real_escape_string($db, $_POST['password']);
            $Confirme_Pass = mysqli_real_escape_string($db, $_POST['cpassword']);
            if ($Pass === $Confirme_Pass) {
                $sql = "UPDATE users SET Password ='" . sha1($Pass) . "' WHERE CodeV='{$_GET['Reset']}'";
                $result = mysqli_query($db, $sql);
                if ($result) {
                    header("Location: changePassSuccess.php");
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password is not match</div>";
                $error = 'style="border:1px Solid red;box-shadow:0px 1px 11px 0px red"';
            }
        }
    }
} else {
    header("Location: Forget.php");
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
                <h2 class="text-center mb-4">Reset Password</h2>
                <?php echo $msg ?>
                <form method="POST">

                    <div class="form-group" <?php echo $error?>>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group" <?php echo $error?>>
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>


</body>

<?php include "inc/footer.php"; ?>