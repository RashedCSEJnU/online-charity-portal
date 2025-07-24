<?php 

    include "inc/header.php";

?>


            
<div class="page-heading">
    <h3>Website Statistics</h3>
</div>


<div class="page-content">
    <section class="row">


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
           

            <!-- <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-primary" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Europe</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">862</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-europe"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-success" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">America</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">375</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-america"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-danger" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Indonesia</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">1025</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-indonesia"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Comments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="assets/images/faces/5.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Congratulations on your graduation!</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="assets/images/faces/2.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                                    this design?</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


        </div>


        <div class="col-12 col-lg-3">


            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/images/users/<?php echo $_SESSION['loginPhoto']; ?>" alt="Profile">
                        </div>
                        <div class="ms-3 name">
                        <h5 class="font-bold"><?php echo $_SESSION['loginName']; ?></h5>
                            <h6 class="text-muted mb-0"><?php echo $_SESSION['loginEmail']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>

    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12 col-xl-5">
                    <!-- Add Catagory Form -->
                    <div class="card">

                        <div class="card-header">
                            <h4>Add Catagory</h4>
                        </div>

                        <div class="card-body">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" method="POST" enctype = "multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Catagory Name</label>
                                                        <input type="text" id="first-name-vertical" class="form-control"
                                                        name="cat_name" placeholder="First Name">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Catagory Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catagory Description" name="cat_description"></textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="photo" class="form-label">Choose Picture</label>
                                                    <input class="form-control" type="file" id="photo" name="photo">
                                                    <label class="form-label">Choose Picture that has (.png, .jpg, .jpeg) extension...</label>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="cat_submit">Submit</button>
                                                    <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- catagory info insertion into the database -->
                                    <?php

                                        if(isset($_POST['cat_submit'])){

                                            $cat_name           = $_POST['cat_name'];
                                            $cat_description    = $_POST['cat_description'];
                                            $photo              = $_FILES['photo']['name'];
                                            $tmp_name           = $_FILES['photo']['tmp_name'];


                                                if(empty($cat_name) || empty($cat_description) || empty($photo))
                                                {
                                                    echo '<span>Catagory Name , Catagory Description and Catagory Picture are Required!!!</span>';
                                                }
                                                else
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
                                                        $updatedPhotoName = $randomNumer.$photo;

                                                        move_uploaded_file($tmp_name, 'assets/images/catagories/'.$updatedPhotoName);

                                                        $catagoryInfo = "INSERT INTO catagory (c_name, c_description,c_photo) VALUES ('$cat_name','$cat_description','$updatedPhotoName')";

                                                        $feedback = mysqli_query($db, $catagoryInfo);

                                                        if($feedback){
                                                        //     echo $cat_name ." Catagory Inserted Successfully";
                                                            header('location: catagory.php');
                                                        }
                                                        else{
                                                            echo "Failed!";
                                                        }
                                                    }
                                                }  
                                        }
                                    ?>
                                </div>
                            </div>   
                        </div>
                    </div>

                    <!-- Update Catagory Form -->

                    <?php 

                        if(isset($_GET['update_id']))
                        {
                            $update_id = $_GET['update_id'];

                            $u_info = "SELECT * FROM catagory where c_id = '$update_id'";
                            $u_feedbackInfo = mysqli_query($db, $u_info);

                        
                            while($u_infoRow = mysqli_fetch_assoc($u_feedbackInfo))
                            {
                                $u_id = $u_infoRow['c_id'];
                                $u_name = $u_infoRow['c_name'];
                                $u_description = $u_infoRow['c_description'];
                                $u_photo = $u_infoRow['c_photo'];
                            }
                            
                    ?>

                            <div class="card">

                                <div class="card-header">
                                    <h4>Update Catagory</h4>
                                </div>

                                <div class="card-body">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-vertical" method="POST">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-vertical">Update Catagory Name</label>
                                                                <input type="text" id="first-name-vertical" class="form-control"
                                                                name="u_name" placeholder="Catagory Name" value="<?php echo $u_name; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Update Description</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                            placeholder="Catagory Description" name="u_description"><?php echo $u_description; ?></textarea>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1" name="u_submit">Submit</button>
                                                            <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>   
                                </div>
                            </div>

                    <?php
                    

                        }
                        


                    ?> 
                    
                    
                    <!-- save your update -->

                    <?php

                        if(isset($_POST['u_submit']))
                        {
        
                            $update_name = $_POST['u_name']; 
                            $update_description = $_POST['u_description']; 

                            $updateInfo = "UPDATE catagory SET c_name = '$update_name', 
                            c_description = '$update_description' where c_id = '$update_id'";

                            $update_feedback = mysqli_query($db, $updateInfo);

                            if($update_feedback)
                            {
                                header('Location: catagory.php');
                            }
                            else
                            {
                                echo "Failed! Try Again";

                            }
                        }

                    ?>
                        
                </div>
        
                <div class="col-12 col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Catagories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">

                                    <!--Table head Section -->

                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Catagory Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <!--Table head Section -->

                                    <tbody>

                                    <!-- Read Catagories From Database -->

                                    <?php

                                        $info = "SELECT * FROM catagory";
                                        $feedbackInfo = mysqli_query($db, $info);

                                        $count = 0;
                                        while($infoRow = mysqli_fetch_assoc($feedbackInfo)){
                                            $c_id = $infoRow['c_id'];
                                            $c_name = $infoRow['c_name'];
                                            $c_description = $infoRow['c_description'];
                                            $count++;

                                    ?>

                                        <tr>
                                            <td class="col-3"><?php echo $count ?></td>

                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="assets/images/faces/5.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0"><?php echo $c_name ?></p>
                                                </div>
                                            </td>

                                            <td class="col-auto">
                                                <p class=" mb-0"><?php echo $c_description ?>!</p>
                                            </td>

                                            <td>
                                                <!-- delete modal Trigger -->
                                                <a type="button" data-toggle="tooltip" data-placement="top" title="Delete">

                                                    <i class="fa fa-trash text-danger" aria-hidden="true" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#delete<?php echo $c_id; ?>"></i>

                                                    <!-- <i class="fa fa-trash text-danger" aria-hidden="true" ></i> -->
                                                </a>

                                                <a type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="catagory.php?update_id=<?php echo $c_id; ?>">
                                                    <i class="fa fa-pencil-square-o ms-2 text-success" aria-hidden="true"></i>
                                                </a>
                                            </td>


                                        </tr>


                                            <!--  Delete  Modal -->

                                            <div class="modal fade text-left" id="delete<?php echo $c_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger ">
                                                            <h5 class="modal-title white text-center m-auto" id="myModalLabel120">Delete Catagory
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body text-center m-auto">

                                                            <img src="assets/images/modal/delete.svg" width="200"  class="d-block md-4 text-center m-auto">

                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancel</span>
                                                            </button>

                                                            <a href="catagory.php?delete_id=<?php echo $c_id;?>" type="button" class="btn btn-danger ms-2">Delete
                                                            </a>

                                                        </div>

                                                        <!-- <div class="modal-footer">

                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancel</span>
                                                            </button>

                                                            <a  type="button" class="btn btn-danger ml-1"
                                                                data-bs-dismiss="modal">Delete
                                                            </a>

                                                            <a  type="button" class="btn btn-danger ml-2"
                                                                data-bs-dismiss="modal"  href="catagory.php?delete_id=<?php echo $c_id; ?>">Delete
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Delete</span>
                                                            </a>

                                                        </div> -->

                                                    </div>
                                                </div>
                                            </div>


                                    <?php

                                        }

                                    ?>    
                                        
                                    </tbody>

                                </table>

                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Delete catagory from database -->

        <?php

        if(isset($_GET['delete_id']))
            {
                $deletee_id = $_GET['delete_id'];

                $del_cat = "DELETE FROM  catagory where c_id = '$deletee_id'";

                $res = mysqli_query($db, $del_cat);

                if($res)
                {
                    header('Location: catagory.php');
                }
                else
                {
                    echo "Error Occured!";
                }
            }


        ?>

</div>

<?php
 
   include "inc/footer.php";
?>