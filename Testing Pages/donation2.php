

<?php  
	include "inc/header.php";
    // $cuss_name=  $_SESSION['loginName'];
    // $cuss_email=  $_SESSION['loginEmail'];
    // echo $cuss_name;
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
        <link rel="stylesheet" href="../admin/assets/css/login.css">

        <style>
            a{
                text-decoration: none;
            }
            
            a:hover{
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <main>
            <form method = "POST">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 login-section-wrapper">
                            <!-- <div class="brand-wrapper">
                            <a href = "index.php"><img src="img/logo.png" alt=""></a>
                            </div> -->
                            <div class="login-wrapper my-auto">
                                <!-- <h1 class="login-title">Donate</h1> -->
                                <form action="#!">
                                    <div class="form-group mb-4">
                                        <label for="catagory">Catagory</label>
                                        <select name="catagory" id="catagory" class="form-control" required  style="color:blue;">
                                                    <option data-display="Project you want to donate">Project you want to donate</option>
                                                    <!-- <option value="1">Donate type 1</option>
                                                    <option value="2">Donate type 2</option>
                                                    <option value="3">Donate type 3</option> -->

                                                    <?php

                                                        $info = "SELECT c_name FROM catagory ORDER BY c_id DESC LIMIT 3";
                                                        $feedbackInfo = mysqli_query($db, $info);

                                                        
                                                        while($infoRow = mysqli_fetch_assoc($feedbackInfo))
                                                        {
                                                            $c_name = $infoRow['c_name'];

                                                            ?>
                                                                <option><?php echo $c_name; ?></option>
                                                            <?php
                                                        }

                                                    ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                            <?php 
												if(!empty($_SESSION['loginEmail'])) 
												{
													?>
														<label for="name">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="<?php echo $_SESSION['loginName']; ?>">
													<?php
												}
												else
												{
													?>
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name">
													<?php
												}
											?>
                                        
                                    </div>

                                    <div class="form-group">
                                    <?php 
												if(!empty($_SESSION['loginEmail'])) 
												{
													?>
														<label for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo $_SESSION['loginEmail']; ?>">
													<?php
												}
												else
												{
													?>
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
													<?php
												}
											?>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount(BDT)">
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" ></textarea>
                                    </div>
                                        

                                    <!-- <input name="donate" id="donate" class="btn btn-block login-btn" type="button" onclick="redirectToCheckout()" value="Donate"> -->
                                    <input name="donate" id="donate" class="btn btn-block login-btn" type="submit" value="Donate">
                                </form>
                                
                            </div>
                        </div>

                            <div class="col-sm-6 px-0 d-none d-sm-block">
                                <img src="../admin/assets/images/login.jpg" alt="login image" class="login-img">
                            </div>
                    </div>
                </div>
            </form>

            <?php 
            
            
                if(isset($_POST['donate'])){
                    if(!empty($_SESSION['loginEmail']))
                    {
                    $donar_id = $_SESSION['loginUserId'];
                    }
                    else
                    {
                        $donar_id = 0;
                    }
                    

                    $name           = mysqli_real_escape_string($db,$_POST['name']);
                    $catagory       = mysqli_real_escape_string($db,$_POST['catagory']);
                    $email          = mysqli_real_escape_string($db,$_POST['email']);
                    $amount         = mysqli_real_escape_string($db,$_POST['amount']);
                    $message        = mysqli_real_escape_string($db,$_POST['message']);
                


                    $dQuery = "INSERT INTO donationinfo (d_id,d_catagory,d_name, d_email,d_message) VALUES('$donar_id','$catagory','$name','$email', '$message')";
                    $dQueryFeedback = mysqli_query($db,$dQuery);
                    if($dQueryFeedback){
                        header('Location: checkout.php?amount=' . $amount);
                    }
                    else{
                        die('Donation Error !'.mysqli_error($db));
                    }


                }
                
            ?>

        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!-- <script>
        function redirectToCheckout() {
        var amount = document.getElementsByName('amount')[0].value;
        window.location.href = 'checkout.php?amount=' + encodeURIComponent(amount);
        }
        </script> -->


    </body>
</html>

<?php  
	include "inc/footer.php";
?>