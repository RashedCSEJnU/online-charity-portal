<?php include "inc/header.php"; ?>


<?php
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

    // Create a new database connection
    $conn = mysqli_connect('localhost', 'root', '', 'charity');

    // Check if the connection was successful
    if (!$conn) {
        die('Database connection failed: ' . mysqli_connect_error());
    }
	$emailExistOrNot = 0;
	$emailCheck = "SELECT email FROM volunteer where email = '$email'";
	$emailCheckFeedback = mysqli_query($db,$emailCheck);
	$emailExistOrNot = mysqli_num_rows($emailCheckFeedback);

	if($emailExistOrNot>0){
		echo "<div class='d-flex justify-content-center'><span class='bg-dark text-light p-2'>Registration failed. Email Already Exists. Try Again</span></div>";
		//header('location: volunteer.php');
	}
    else{
		// Prepare the SQL statement to insert data into the table
		$sql = "INSERT INTO volunteer (name, email, phone, gender, birthdate, address, availability, skills, bloodGroup, reference, volunteering_period, message) 
		VALUES ('$name', '$email', '$phone', '$gender', '$birthdate', '$address', '$availability', '$skills', '$blood_group', '$reference', '$volunteeringPeriod', '$message')";
	
		// Execute the SQL statement
		if (mysqli_query($conn, $sql)) {
			//echo 'Registration successful!';
			header('location: volSuccess.php');
		} else {
			echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
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