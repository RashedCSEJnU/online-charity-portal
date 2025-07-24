<?php
    include "inc/header.php";

    // if(empty($_SESSION['loginEmail'])){
    //   header('Location: login.php');
    // }
    
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


    $do = "update";
?>

<head>
    <!-- profile link -->
    <link rel="stylesheet" href="css/profile.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="container emp-profile">

        <form method="post" action="userEdit.php?do=update" enctype="multipart/form-data">
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
                            <input type="file" name="photo" id="photo" />
                        </div>

                    </div>
                </div>


                <div class="col-md-6">
                    <div class="profile-head">
                        <h5><?php echo $name; ?></h5>
                        <h6><?php echo $biodata; ?></h6>

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

                <!-- Edit Profile -->
                <div class="col-md-2">
                    <!-- <input
                type="submit"
                class="profile-edit-btn"
                name="btnAddMore"
                value="Edit Profile"
            /> -->

                    <button type="submit" class="profile-edit-btn" name="edit_user">
                        Submit
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
                                <div class="col-md-4">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="user_name" placeholder="Name"
                                        name="user_name" autocomplete="off" value="<?php echo $name; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input class="form-control" type="email" id="email"
                                        placeholder="example@something.com" name="email" autocomplete="off" required
                                        value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Phone Number</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input class="form-control" type="number" id="phone" placeholder="Phone Number"
                                        name="phone" value="<?php echo $phone; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input class="form-control" type="password" id="password" placeholder="Password"
                                        name="password" autocomplete="off" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Confirm Password</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input class="form-control" type="password" id="password" placeholder="Password"
                                        name="password" autocomplete="off" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <textarea name="address" id="address" rows="3" class="form-control"
                                        value="<?php echo $address; ?>"><?php echo $address; ?></textarea>
                                    <label class="form-label">Your current address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Birthday</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input class="form-control" type="date" id="birthday" name="birthday"
                                        value="<?php echo $birthday; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <select name="gender" id="gender" class="form-select">
                                        <option>Please Select Your Gender</option>
                                        <option value='Male' <?php if($gender == 'Male') echo 'selected'; ?>>Male
                                        </option>
                                        <option value='Female' <?php if($gender == 'Female') echo 'selected'; ?>>Female
                                        </option>
                                        <option value='Other' <?php if($gender == 'Other') echo 'selected'; ?>>Other
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline -->

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Biodata</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <textarea name="biodata" id="biodata" rows="2" class="form-control"
                                        value="<?php echo $biodata; ?>">
                        <?php echo $biodata; ?>
                    </textarea>
                                    <label class="form-label">Write Your Biodata</label>
                                </div>
                            </div>
                            <?php 
                    if($_SESSION['loginUserRole']==2)
                    {
                        ?>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>User Role</label>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <select name="user_role" id="user_role" class="form-select">
                                        <option>Please Select User Role</option>
                                        <option value="0" <?php if($user_role == 0) echo 'selected'; ?>>Subscriber
                                        </option>
                                        <option value="1" <?php if($user_role == 1) echo 'selected'; ?>>Editor</option>
                                        <option value="2" <?php if($user_role == 2) echo 'selected'; ?>>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <?php
                    }
                
                ?>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <!-- <label>User Status</label> -->
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input class="form-control" type="hidden" id="status" name="status" value="0">
                                    <input class="form-control" type="hidden" id="edit_user_id" name="edit_user_id"
                                        value="<?php echo $u_id; ?>">
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


<?php 

if($do=='update')
{
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $edit_user_id             = $_POST['edit_user_id'];
        $updatedName              = $_POST['user_name'];
        $updatedEmail             = $_POST['email'];
        $updatedPhone             = $_POST['phone'];
        $updatedPassword          = $_POST['password'];
        $updatedAddress           = $_POST['address'];
        $updatedBirthday          = $_POST['birthday'];
        $updatedGender            = $_POST['gender'];
        $updatedBiodata           = $_POST['biodata'];
        $updatedUser_role         = $_POST['user_role'];
        $updatedStatus            = $_POST['status'];
        $photo_file               = $_FILES['photo']['name'];
        $tmp_photo_file           = $_FILES['photo']['tmp_name'];



        if(!empty($updatedPassword) and !empty($photo_file))
        {
            $updatedEncryptedPassword = sha1($updatedPassword);
            $extn_array = explode('.',$_FILES['photo']['name']);
            $extension = strtolower(end($extn_array));

            $granted_extn = array('jpg','png','jpeg');

            if(in_array($extension,$granted_extn)===false)
            {
                echo 'Please insert jpg, png or jpeg extension files!!!';
            }
            else
            {
                $randomNumer = rand();
                $updatedEncryptedPhotoFile = $randomNumer.$photo_file;
                move_uploaded_file($tmp_photo_file, '../admin/assets/images/users/'.$updatedEncryptedPhotoFile);

                // $tableName = 'users';
                // $deleteeId = $edit_user_id; 
                // $key = 'u_id';
                // deleteUserPhoto($tableName,$key, $deleteeId);

                $updateQuery = "UPDATE users SET name='$updatedName', email = '$updatedEmail' , phone = '$updatedPhone', password='$updatedEncryptedPassword', 
                address='$updatedAddress', birthday = '$updatedBirthday', gender = '$updatedGender', biodata='$updatedBiodata', user_role='$updatedUser_role',
                photo = '$updatedEncryptedPhotoFile', status='$updatedStatus' WHERE u_id = '$edit_user_id'";

                $updateQueryFeedback = mysqli_query($db,$updateQuery);

                if($updateQueryFeedback)
                {
                    header('Location: profile.php');
                }
                else
                {
                    die('Unsuccesfull Attempt For Edit User Information...'.mysqli_error($db));
                }
            }

            
        }
        else if(empty($updatedPassword) and !empty($photo_file))
        {
            
            $extn_array = explode('.',$_FILES['photo']['name']);
            $extension = strtolower(end($extn_array));

            $granted_extn = array('jpg','png','jpeg');

            if(in_array($extension,$granted_extn)===false)
            {
                echo 'Please insert jpg, png or jpeg extension files!!!';
            }
            else
            {
                $randomNumer = rand();
                $updatedEncryptedPhotoFile = $randomNumer.$photo_file;
                move_uploaded_file($tmp_photo_file, '../admin/assets/images/users/'.$updatedEncryptedPhotoFile);

                // Deleting Photo file form Folder
                // $tableName = 'users';
                // $deleteeId = $edit_user_id; 
                // $key = 'u_id';
                // deleteUserPhoto($tableName,$key, $deleteeId);


                $updateQuery = "UPDATE users SET name='$updatedName', email = '$updatedEmail' , phone = '$updatedPhone', 
                address='$updatedAddress', birthday = '$updatedBirthday', gender = '$updatedGender', biodata='$updatedBiodata', user_role='$updatedUser_role',
                photo = '$updatedEncryptedPhotoFile', status='$updatedStatus' WHERE u_id = '$edit_user_id' ";

                $updateQueryFeedback = mysqli_query($db,$updateQuery);

                if($updateQueryFeedback)
                {
                    header('Location: profile.php');
                }
                else
                {
                    die('Unsuccesfull Attempt For Edit User Information...'.mysqli_error($db));
                }
            }
        }
        else if(!empty($updatedPassword) and empty($photo_file))
        {
            $updatedEncryptedPassword = sha1($updatedPassword);
           
            $updateQuery = "UPDATE users SET name='$updatedName', email = '$updatedEmail' , phone = '$updatedPhone', password='$updatedEncryptedPassword', 
            address='$updatedAddress', birthday = '$updatedBirthday', gender = '$updatedGender', biodata='$updatedBiodata', user_role='$updatedUser_role',
            status='$updatedStatus' WHERE u_id = '$edit_user_id'";

            $updateQueryFeedback = mysqli_query($db,$updateQuery);

            if($updateQueryFeedback)
            {
                header('Location: profile.php');
            }
            else
            {
                die('Unsuccesfull Attempt For Edit User Information...'.mysqli_error($db));
            }
            
        }
        else
        {       
                $randomNumer = rand();
                $updatedEncryptedPhotoFile = $randomNumer.$photo_file;

                $updateQuery = "UPDATE users SET name='$updatedName', email = '$updatedEmail' , phone = '$updatedPhone',
                address='$updatedAddress', birthday = '$updatedBirthday', gender = '$updatedGender', biodata='$updatedBiodata', user_role='$updatedUser_role',
                status='$updatedStatus' WHERE u_id = '$edit_user_id'";

                $updateQueryFeedback = mysqli_query($db,$updateQuery);

                if($updateQueryFeedback)
                {
                    header('Location: profile.php');
                }
                else
                {
                    die('Unsuccesfull Attempt For Edit User Information...'.mysqli_error($db));
                }
            
        }
        
    }
}


?>

<?php include "inc/footer.php"; ?>