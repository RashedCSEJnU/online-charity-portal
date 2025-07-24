
			
            
            <!-- Start donate HTML Code Area -->
			<section class="donate-area relative section-gap" id="donate">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-end">
						<div class="col-lg-6 col-sm-12 pb-80 header-text">
							<h1>Donate Now</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="row d-flex justify-content-center">
						<div class="col-lg-6 contact-left">
							<div class="single-info">
								<h4>Divided Evenly</h4>
								<p>
									inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
								</p>
							</div>
							<div class="single-info">
								<h4>Transperancy All the Way</h4>
								<p>
									inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
								</p>
							</div>
							<div class="single-info">
								<h4>Trustworthy</h4>
								<p>
									inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
								</p>
							</div>
						</div>
						<div class="col-lg-6 contact-right">



							<!-- Donation Form -->

							<form method="POST" >
								 	<div class="row">
								 		<div class="col-lg-12 d-flex flex-column">
							 				<select name="catagory" class="app-select form-control" required>
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
															<option selected><?php echo $c_name; ?></option>
														<?php
													}

												?>
											</select>
								 		</div>

							 			<div class="col-lg-6 d-flex flex-column">
										 
										 <?php 
												if(!empty($_SESSION['loginEmail'])) 
												{
													?>
														<input name="name" placeholder="<?php echo $_SESSION['loginName']; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="form-control mt-20" value="<?php echo $_SESSION['loginName']; ?>" type="text">

													<?php
												}
												else
												{
													?>
														<input name="name" placeholder="Enter your name" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder ='Enter email address'" class="form-control mt-20"  type="text">
														
													<?php
												}
											?>
										</div>
										<div class="col-lg-6 d-flex flex-column">
											<?php 
												if(!empty($_SESSION['loginEmail'])) 
												{
													?>
														<input name="email" placeholder="<?php echo $_SESSION['loginEmail']; ?>" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder ='Enter email address'" class="form-control mt-20" value="<?php echo $_SESSION['loginEmail']; ?>" type="email">
													<?php
												}
												else
												{
													?>
													<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder ='Enter email address'" class="form-control mt-20"  type="email">
														
													<?php
												}
											?>

										</div>
										<div class="col-lg-12 d-flex flex-column">

											<input name="amount" placeholder="Donation amount (BDT)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Donation amount (BDT)'" class="form-control mt-20"  type="text">
											
											<textarea class="form-control mt-20" name="message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" ></textarea>
										</div>


										<div class="col-lg-12 d-flex justify-content-end send-btn">
											
											<!-- <button name="donate" type="submit" class="submit-btn primary-btn mt-20 text-uppercase" onclick="redirectToCheckout()">donate<span class="lnr lnr-arrow-right"></span></button> -->
											<!-- <button type="submit" class="submit-btn primary-btn mt-20 text-uppercase">donate<span class="lnr lnr-arrow-right"></span></button> -->
											<!-- <button type="submit" class="btn btn-primary me-1 mb-1 mt-2" name="donate">Submit</button> -->
											<input name="donate" id="donate" class="primary-btn mt-20 text-uppercase" type="submit" value="Donate">

										</div>

										<!-- <div class="alert-msg"></div> -->
									</div>
					  		</form>


					  		<p class="payment-method">
					  			We Accept :   <img src="img/payment.png" alt="">
					  		</p>
						</div>
					</div>
				</div>
			</section>


			<!-- End donate HTML Code Area -->

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
                    

                    $name       	= mysqli_real_escape_string($db,$_POST['name']);
                    $catagory       = mysqli_real_escape_string($db,$_POST['catagory']);
                    $email      	= mysqli_real_escape_string($db,$_POST['email']);
                    $amount      	= mysqli_real_escape_string($db,$_POST['amount']);
                    $message      	= mysqli_real_escape_string($db,$_POST['message']);
                


                    $dQuery = "INSERT INTO donationinfo (d_catagory,d_id,d_name,d_email,d_message) VALUES('$catagory','$donar_id','$name','$email', '$message')";
                    $dQueryFeedback = mysqli_query($db,$dQuery);
                    if($dQueryFeedback){
                        header('Location: checkout.php?amount=' . $amount);
                    }
                    else{
                        die('Donation Error !'.mysqli_error($db));
                    }


                }
                
            ?>

<!-- <script>
function redirectToCheckout() {
  var amount = document.getElementsByName('amount')[0].value;
  window.location.href = 'checkout.php?amount=' + encodeURIComponent(amount);
}
</script> -->

