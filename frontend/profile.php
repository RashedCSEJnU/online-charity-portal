<?php
    include "inc/header.php";

    if(empty($_SESSION['loginEmail'])){
      header('Location: login.php');
    }
    
    $loggedInId = $_SESSION['loginUserId'];
    
    $u_query = "SELECT * FROM users WHERE u_id = '$loggedInId'";
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
    <link rel="stylesheet" href="css/profile.css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" /> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
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
                        <img src="../admin/assets/images/users/<?php echo $photo; ?>" alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-head">
                        <h5><?php echo $name; ?></h5>
                        <h6><?php echo $biodata ?></h6>

                        <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                        <div class="proile-rating"></div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Others Info</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- donation History -->
                <div class="col-md-2">
                    <!-- <input
                        type="submit"
                        class="profile-edit-btn"
                        name="btnAddMore"
                        value="Edit Profile"
                    /> -->

                    <button type="button" class="profile-edit-btn" style="outline: none"
                        onclick="window.location.href = 'donationinfo.php'">
                        Donation History
                    </button>
                </div>

                <!-- Edit Profile -->
                <div class="col-md-2">
                    <!-- <input
                        type="submit"
                        class="profile-edit-btn"
                        name="btnAddMore"
                        value="Edit Profile"
                    /> -->

                    <button type="button" class="profile-edit-btn" style="outline: none"
                        onclick="window.location.href = 'userEdit.php'">
                        Edit Your Profile
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <!-- <div class="profile-work">
                <p>WORK LINK</p>
                <a href="">Website Link</a><br />
                <a href="">Bootsnipp Profile</a><br />
                <a href="">Bootply Profile</a>
                <p>SKILLS</p>
                <a href="">Web Designer</a><br />
                <a href="">Web Developer</a><br />
                <a href="">WordPress</a><br />
                <a href="">WooCommerce</a><br />
                <a href="">PHP, .Net</a><br />
                </div> -->
                </div>

                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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

    <script>
    const profile = document.getElementById("profile-tab");
    profile.addEventListener("click", function() {
        document.getElementById("profile").classList.add("active");
        document.getElementById("profile").classList.add("show");
        document.getElementById("home").classList.remove("active");
        document.getElementById("home").classList.remove("show");
        document.getElementById("home-tab").classList.remove("active");
        document.getElementById("profile-tab").classList.add("active");
    });

    const home = document.getElementById("home-tab");
    home.addEventListener("click", function() {
        document.getElementById("home").classList.add("active");
        document.getElementById("home").classList.add("show");
        document.getElementById("profile").classList.remove("active");
        document.getElementById("profile").classList.remove("show");
        document.getElementById("profile-tab").classList.remove("active");
        document.getElementById("home-tab").classList.add("active");
    });


    // Invoking Edit User Page 
    // document.querySelector('.profile-edit-btn').addEventListener('click', function() {
    // window.location.href = 'userEdit.php';
    // });
    </script>
</body>

<?php include "inc/footer.php"; ?>