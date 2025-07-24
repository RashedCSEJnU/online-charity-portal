<?php
    include "inc/header.php";

    $profileId = $_GET['do'];

    //$profileId = 5;

    $u_query = "SELECT * FROM users WHERE u_id = '$profileId'";
    $u_db_feedback = mysqli_query($db,$u_query);
    
    while($row = mysqli_fetch_assoc($u_db_feedback))
    {
        $u_id        = $row['u_id'];
        $name        = $row['name'];
        $email       = $row['email'];
        $phone       = $row['phone'];
        $address     = $row['address'];
        $birthday    = $row['birthday'];
        $gender      = $row['gender'];
        $biodata     = $row['biodata'];
        $photo       = $row['photo'];
        $password    = $row['password'];
        $user_role   = $row['user_role'];
        $status      = $row['status'];
    }

    ?>

        <head>
        <!-- profile link -->
        <link rel="stylesheet" href="../frontend/css/profile.css">
        <link
        href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        rel="stylesheet"
        id="bootstrap-css"
        />
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </head>

        <!-- <section class="row">


                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Website Views</h6>
                                                <h6 class="font-extrabold mb-0">1000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?php 
                                                        $follwers               = "SELECT * FROM users";
                                                        $follwersFeedback       = mysqli_query($db,$follwers);
                                                        $follwersRows           = mysqli_num_rows($follwersFeedback);
                                                        echo $follwersRows;
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Volunteers</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?php 
                                                        $volunteers               = "SELECT * FROM volunteer";
                                                        $volunteersFeedback       = mysqli_query($db,$volunteers);
                                                        $volunteersRows           = mysqli_num_rows($volunteersFeedback);
                                                        echo $volunteersRows;
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Catagories</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?php 
                                                        $catagories               = "SELECT * FROM catagory";
                                                        $catagoriesFeedback       = mysqli_query($db,$catagories);
                                                        $catagoriesRows           = mysqli_num_rows($catagoriesFeedback);
                                                        echo $catagoriesRows;
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    



                    </div>


                    <div class="col-12 col-lg-3">


                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/users/<?php echo $photo; ?>" alt="Profile">
                                    </div>
                                    <div class="ms-3 name">
                                    <h5 class="font-bold"><?php echo $name; ?></h5>
                                        <h6 class="text-muted mb-0"><?php echo $email; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


        </section> -->

        <body>
            <div class="page-content">
                
                <section class="row">

                    <div class="container emp-profile">
                        <form method="post">
                            <!-- Profile Section -->

                            <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                <!-- <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                                    alt=""
                                /> -->
                                <img
                                    src="assets/images/users/<?php echo $photo; ?>"
                                    alt=""
                                />
                                <div class="file btn btn-lg btn-primary">
                                    Change Photo
                                    <input type="file" name="file" />
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                <h5><?php echo $name; ?></h5>
                                <h6>Web Developer and Designer</h6>

                                <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                                <div class="proile-rating"></div>

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                    <a
                                        class="nav-link active"
                                        id="home-tab"
                                        data-toggle="tab"
                                        href="#home"
                                        role="tab"
                                        aria-controls="home"
                                        aria-selected="true"
                                        >About</a
                                    >
                                    </li>
                                    <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        id="profile-tab"
                                        data-toggle="tab"
                                        href="#profile"
                                        role="tab"
                                        aria-controls="profile"
                                        aria-selected="false"
                                        >Others Info</a
                                    >
                                    </li>
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input
                                type="submit"
                                class="profile-edit-btn"
                                name="btnAddMore"
                                value="Edit Profile"
                                />
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4">
                               
                            </div>

                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                <div
                                    class="tab-pane fade show active"
                                    id="home"
                                    role="tabpanel"
                                    aria-labelledby="home-tab"
                                >
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $name; ?></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $email; ?></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $phone; ?></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $address; ?></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Birthday</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $birthday; ?></p>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $gender; ?></p>
                                    </div>
                                    </div>
                                </div>

                                <!-- Timeline -->

                                <div
                                    class="tab-pane fade"
                                    id="profile"
                                    role="tabpanel"
                                    aria-labelledby="profile-tab"
                                >
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>Biodata</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $biodata; ?></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>User Role</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                        <?php 
                                            if($user_role==0) echo '<span class="text-success">Subscriber</span>';
                                            if($user_role==1) echo '<span class="text-warning">Editor</span>';
                                            if($user_role==2) echo '<span class="text-danger">Admin</span>';
                                        ?>
                                        </p>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label>User Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                        <?php 
                                            if($status==0) echo '<span class="text-secondary">InActive</span>';
                                            if($status==1) echo '<span class="text-success">Active</span>';
                                            
                                        ?>
                                        </p>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>

                    

                </section>

            </div>
                <script>
                        const profile = document.getElementById("profile-tab");
                        profile.addEventListener("click", function () {
                            document.getElementById("profile").classList.add("active");
                            document.getElementById("profile").classList.add("show");
                            document.getElementById("home").classList.remove("active");
                            document.getElementById("home").classList.remove("show");
                            document.getElementById("home-tab").classList.remove("active");
                            document.getElementById("profile-tab").classList.add("active");
                        });

                        const home = document.getElementById("home-tab");
                        home.addEventListener("click", function () {
                            document.getElementById("home").classList.add("active");
                            document.getElementById("home").classList.add("show");
                            document.getElementById("profile").classList.remove("active");
                            document.getElementById("profile").classList.remove("show");
                            document.getElementById("profile-tab").classList.remove("active");
                            document.getElementById("home-tab").classList.add("active");
                        });
                </script>
        </body>

    <?php

?>



<?php

    include "inc/footer.php";
?>