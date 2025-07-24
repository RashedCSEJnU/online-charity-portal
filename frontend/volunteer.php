<?php include "inc/header.php"; ?>


<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define database connection constants
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'charity');

    // Initialize variables
    $name = $email = $phone = $gender = $birthdate = $address = $availability = $skills = $reference = $volunteeringPeriod = $message = '';

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
    $gender = test_input($_POST['gender']);
    // $blood_group = test_input($_POST['blood_group']);
    $birthdate = test_input($_POST['birthdate']);
    $address = test_input($_POST['address']);
    $availability = test_input($_POST['availability']);
    $skills = test_input($_POST['skills']);
    $blood_group = test_input($_POST['blood_group']);
    //$motivation = test_input($_POST['motivation']);
    $reference = test_input($_POST['reference']);
    $volunteeringPeriod = test_input($_POST['volunteering_period']);
    $message = test_input($_POST['message']);
    $Code = mysqli_real_escape_string($db, sha1(rand()));

    // Create a new database connection
    $conn = mysqli_connect('localhost', 'root', '', 'charity');

    // Check if the connection was successful
    if (!$conn) {
        die('Database connection failed: ' . mysqli_connect_error());
    }
	// $emailExistOrNot = 0;
	// $emailCheck = "SELECT email FROM volunteer where email = '$email'";
	// $emailCheckFeedback = mysqli_query($db,$emailCheck);
	// $emailExistOrNot = mysqli_num_rows($emailCheckFeedback);

	// if($emailExistOrNot>0){
	// 	echo "<div class='d-flex justify-content-center'><span class='bg-dark text-light p-2'>Registration failed. Email Already Exists. Try Again</span></div>";
	// 	//header('location: volunteer.php');
	// }

    if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM volunteer where email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>This Email:'{$email}' has been alredy existe.</div>";
    }
    else{

		// Prepare the SQL statement to insert data into the table
		$sql = "INSERT INTO volunteer (name, email, phone, gender, birthdate, address, availability, skills, bloodGroup, reference, volunteering_period, message,CodeV) 
		VALUES ('$name', '$email', '$phone', '$gender', '$birthdate', '$address', '$availability', '$skills', '$blood_group', '$reference', '$volunteeringPeriod', '$message','$Code')";
	
		// Execute the SQL statement
		if (mysqli_query($conn, $sql)) {
			//echo 'Registration successful!';
			//header('location: volSuccess.php');


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
                    $mail->Subject = 'Volunteer Registration Link';
                    $mail->Body    = '<p> This is the Verifecation Link<b><a href="http://localhost/charity/frontend/volSuccess.php?Verification='.$Code.'"> Click here for confirm Volunteer Registration </a></b></p>';

                    $mail->send();
                 
                    }catch (Exception $e){
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    $msg = "<div class='alert alert-info'>we've send a verification link on Your email Address<br>Please Confirm the Link</div>";
        }
        else{
                $msg = "<div class='alert alert-danger'>Something was Wrong</div>"; 
        }
	} 
    mysqli_close($conn);
}
    
?>

<head>
    <!-- volunteer css -->

    <link rel="stylesheet" type="text/css" href="css/volunteer.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Volunteer Registration Form</h2>
            <form method="POST">

                <div class="row">
                    <?php echo $msg ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>


                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                    checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthdate">Date of Birth:</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>


                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="availability">Availability:</label>
                            <select class="form-control" id="availability" name="availability" required>
                                <option value="" selected disabled>Please select</option>
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                                <option value="weekends-only">Weekends only</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="skills">Skills:</label>
                            <textarea class="form-control" id="skills" name="skills" rows="2" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="blood_group">Blood Group: </label>
                            <input type="text" class="form-control" id="blood_group" name="blood_group" required>
                        </div>

                        <div class="form-group">
                            <label for="reference">How did you hear about us?</label>
                            <input type="text" class="form-control" id="reference" name="reference" required>
                        </div>


                        <div class="form-group">
                            <label for="volunteering_period">Preferred Volunteering Period:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="volunteering_period" id="morning"
                                    value="morning" checked>
                                <label class="form-check-label" for="morning">
                                    Morning (9am - 12pm)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="volunteering_period" id="afternoon"
                                    value="afternoon">
                                <label class="form-check-label" for="afternoon">
                                    Afternoon (12pm - 3pm)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="volunteering_period" id="evening"
                                    value="evening">
                                <label class="form-check-label" for="evening">
                                    Evening (3pm - 6pm)
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="2"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>