<?php 

    include "inc/header.php"; 
    ob_start();
    if(!empty($_SESSION['loginEmail'])){
        header('Location: index.php');
    }

?>

<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$msg = "";
$Error_Pass="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define database connection constants
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'charity');

    // Initialize variables
    $name = $email = $phone = $password = '';

    // Function to sanitize and validate input data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate and sanitize input data
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $password = test_input($_POST['password']);
    $cpassword = test_input($_POST['cpassword']);
    $Code = mysqli_real_escape_string($db, sha1(rand()));

    // Create a new database connection
    $conn = mysqli_connect('localhost', 'root', '', 'charity');

    // Check if the connection was successful
    if (!$conn) {
        die('Database connection failed: ' . mysqli_connect_error());
    }


    if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM users where email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>This Email:'{$email}' has been alredy existe.</div>";
    }
    else{
        if ($password === $cpassword) {
            $Password = sha1($password);
            $query = "INSERT INTO users(`name`, `email`, `password`, `CodeV`) values('$name','$email','$Password','$Code')";
            $result = mysqli_query($db, $query);
            if ($result) {
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'ishtiyak@gmail.com';                     //SMTP username (your email address which you used to generate app password)
                    $mail->Password   = '';                               //SMTP password (Your gamil app password)
                    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('ishtiyaksezar@gmail.com','Charity');
                    $mail->addAddress($email,$name);
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Registration Link';
                    $mail->Body    = '<p> This is the Verifecation Link<b><a href="http://localhost/charity/frontend/login.php?Verification='.$Code.'"> Click here for confirm Registration </a></b></p>';

                    $mail->send();
                    
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                $msg = "<div class='alert alert-info'>we've send a verification link on Your email Address<br>Please Confirm the Link</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Something was Wrong</div>";
                
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password is not match</div>";
            $Error_Pass='style="border:1px Solid red;box-shadow:0px 1px 11px 0px red"';
        }
    }

    // if($password==$cpassword){
    //     // Prepare the SQL statement to insert data into the table
    //     $hashPassword = sha1($password);
    //     $sql = "INSERT INTO users (name, email, phone, password) 
    //     VALUES ('$name', '$email', '$phone', '$hashPassword')";

    //     // Execute the SQL statement
    //     if (mysqli_query($conn, $sql)) {
    //         echo 'Sign Up successful!';
    //         header('location: login.php');
    //     } else {
    //         echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    //     }
    // }

    // Close the database connection
    mysqli_close($conn);
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
                <h2 class="text-center mb-4">Sign Up</h2>
                <?php echo $msg ?>
                <form method="POST">

                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>


                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>


                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>

                    <div class="form-group" <?php echo $Error_Pass?>>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group" <?php echo $Error_Pass?>>
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
                </form>
                <p class="login-wrapper-footer-text mt-3">Already have an account? <a href="login.php"
                        class="text-reset"><strong style="font-weight:700">Login here</strong></a></p>
            </div>
        </div>
    </div>

    <?php ob_end_flush(); ?>
</body>

<?php include "inc/footer.php"; ?>