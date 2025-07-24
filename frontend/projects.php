<section class="project-area section-gap" id="project">
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-80 header-text">
                <h1>Waiting for Help</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br>
                    labore et dolore magna aliqua.
                </p>
            </div>
        </div>

        <div class="row">
            <?php

                            $info = "SELECT * FROM catagory ORDER BY c_id DESC LIMIT 6";
                            $feedbackInfo = mysqli_query($db, $info);

                            while($infoRow = mysqli_fetch_assoc($feedbackInfo))
                            {
                                $c_id = $infoRow['c_id'];
                                $c_name = $infoRow['c_name'];
                                $c_description = $infoRow['c_description'];
                                $c_photo = $infoRow['c_photo'];

                                ?>
            <div class="col-lg-4 col-md-4 project-wrap">
                <div class="single-project">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto"
                                src="../admin/assets/images/catagories/<?php echo $c_photo; ?>" alt="">
                            <div class="content-details fadeIn-bottom">
                                <a href="#" class="head-btn btn text-uppercase">Donate Now</a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="details">
                    <a href="#">
                        <h2><?php echo $c_name; ?></h2>
                    </a>
                    <p><?php echo $c_description; ?></p>
                    <a class="text-uppercase" href="#">read more</a>
                </div>
            </div>
            <?php
                            }
                        ?>
        </div>


    </div>
</section>