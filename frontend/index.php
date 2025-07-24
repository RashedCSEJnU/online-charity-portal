<?php  
	include "inc/header.php";

?>

<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start" style="height: 915px;">
            <div class="banner-content col-lg-9 col-md-12">
                <h1>
                    Your Donation <br>
                    is Others Inspiration
                </h1>
                <a href="#donate" class="head-btn btn text-uppercase">Donate Now</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start callto Area -->
<section class="callto-area relative">
    <div class="container">
        <div class="row d-flex callto-wrap justify-content-between pt-40 pb-40">
            <!-- <h3 class="text-white">Please Help them and Donate now</h3> -->
            <?php
				$totalCollection = 0;
				$collection = "SELECT d_amount FROM donationinfo";
				$collectionFeedback = mysqli_query($db,$collection);
				while($row = mysqli_fetch_assoc($collectionFeedback)){
					$totalCollection+=$row['d_amount'];
				}
			?>
            <h3 class="text-white">Till now total Collection : <strong class="text-dark"><?php echo $totalCollection ?>
                    BDT</strong></h3>
            <a href="#donate" class="head-btn head-btn2 btn text-uppercase">Donate Now</a>
        </div>
    </div>
</section>
<!-- End callto Area -->


<!-- Start project Area -->

<!-- <section class="project-area section-gap" id="project">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-80 header-text">
							<h1>Waiting for Help</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 project-wrap">
							<div class="single-project">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/p1.jpg" alt="">
								      	<div class="content-details fadeIn-bottom">
								      		<a href="#" class="head-btn btn text-uppercase">Donate Now</a>
								      	</div>
								    </a>
								 </div>
							</div>
							<div class="details">
								<a href="#"><h2>Easy Flight Search</h2></a>
						  		<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
						  		<a class="text-uppercase" href="#">read more</a>
							</div>

						</div>
						<div class="col-lg-4 col-md-4 project-wrap">
							<div class="single-project">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/p2.jpg" alt="">
								      	<div class="content-details fadeIn-bottom">
								      		<a href="#" class="head-btn btn text-uppercase">Donate Now</a>
								      	</div>
								    </a>
								 </div>
							</div>
							<div class="details">
								<a href="#"><h2>Easy Flight Search</h2></a>
						  		<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
						  		<a class="text-uppercase" href="#">read more</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 project-wrap">
							<div class="single-project">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/p3.jpg" alt="">
								      	<div class="content-details fadeIn-bottom">
								      		<a href="#" class="head-btn btn text-uppercase">Donate Now</a>
								      	</div>
								    </a>
								 </div>
							</div>
							<div class="details">
								<a href="#"><h2>Easy Flight Search</h2></a>
						  		<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
						  		<a class="text-uppercase" href="#">read more</a>
							</div>
						</div>

					</div>
				</div>
			</section> -->

<?php include "projects.php"; ?>

<!-- End project Area -->

<!-- Start about Area -->
<section class="about-area" id="about">
    <div class="container-fluid">
        <div class="row d-flex justify-content-end align-items-center">
            <div class="col-lg-6 col-md-12 about-left no-padding">
                <img class="img-fluid" src="img/about-img.jpg" alt="">
            </div>
            <div class="col-lg-6 col-md-12 about-right">
                <h1>A very Lovely Welcome <br>
                    to our Charity</h1>
                <p>
                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                    standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the
                    job is beyond reproach. inappropriate behavior is often laughed.
                </p>
                <button class="primary-btn mt-20 text-uppercase ">learn more<span
                        class="lnr lnr-arrow-right"></span></button>
            </div>
        </div>
    </div>
</section>
<!-- End about Area -->

<!-- Start volunteer Area -->
<section class="volunteer-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-80 header-text">
                <h1>Our Volunteers</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br>
                    labore et dolore magna aliqua.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 vol-wrap">
                <div class="single-vol">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="img/volunteer1.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <h4>Farhan Ishtiyak Sezar</h4>
                                <p>
                                    Competitive Programmer
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 vol-wrap">
                <div class="single-vol">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="img/volunteer2.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <h4>Rashedunnabi Rashed</h4>
                                <p>
                                    Competitive Programmer
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 vol-wrap">
                <div class="single-vol">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="img/volunteer3.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <h4>Emamul Rafi</h4>
                                <p>
                                    Web Developer
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 vol-wrap">
                <div class="single-vol">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="img/vol5.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <h4>Nur Alamin</h4>
                                <p>
                                    Photographer
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End volunteer Area -->

<!-- Start donate  Area -->




<!-- Start donate HTML Code Area -->
<?php
	include "donation.php";
?>


<!-- End donate  Area -->

<?php 

	include "inc/footer.php";

?>