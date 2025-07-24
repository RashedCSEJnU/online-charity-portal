<?php 
    include "inc/header.php"; 
    ob_start();
    if(!empty($_SESSION['loginEmail'])){
        header('Location: index.php');
    }
?>

<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   
   //Load Composer's autoloader
   require 'vendor/autoload.php';

   
   $msg = "";
   if (isset($_POST['Reset'])) {
       $email = mysqli_real_escape_string($db, $_POST['email']);
       $CodeReset = mysqli_real_escape_string($db, sha1(rand()));
       if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
           $query = mysqli_query($db, "UPDATE users SET CodeV='{$CodeReset}' WHERE email='{$email}'");
           if ($query) {
               $mail = new PHPMailer(true);
   
               try {
                   //Server settings
                   $mail->SMTPDebug = 0;                      //Enable verbose debug output
                   $mail->isSMTP();                                            //Send using SMTP
                   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                   $mail->Username   = 'ishtiyak@gmail.com';                     //SMTP username
                   $mail->Password   = '';                               //SMTP password
                   $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                   $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
                   //Recipients
                   $mail->setFrom('ishtiyaksezar@gmail.com', 'Password Recovery');
                   $mail->addAddress($email);
                   //Content
                   $mail->isHTML(true);                                  //Set email format to HTML
                   $mail->Subject = 'Recover Your Password';
                   $mail->Body    = '<p> This is the Verifecation Link<b><a href="http://localhost/charity/frontend/changePassword.php?Reset=' . $CodeReset . '"</a> Click Here For Reset Password</b></p>';
   
                   $mail->send();
               } catch (Exception $e) {
                   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
               }
               $msg = "<div class='alert alert-info'>we've send a verification Link on Your email Address</div>";
           }
       } else {
           $msg = "<div class='alert alert-danger'>This email:'{$email}' don't found </div>";
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
                <h2 class="text-center mb-4">Reset Password</h2>
                <?php echo $msg ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4" name="Reset">Reset</button>
                </form>

            </div>
        </div>
    </div>


</body>

<?php include "inc/footer.php"; ?>