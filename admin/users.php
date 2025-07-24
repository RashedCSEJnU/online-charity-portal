<?php 

    include "inc/header.php";

?>

<?php 

    $do = isset($_GET['do'])?$_GET['do']:'manage';

    if($do=='add')
    {
        ?>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">

                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add New User</h3>
                            <p class="text-subtitle text-muted">Add new user into the database</p>
                        </div>

                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Add new user form start -->

                <section class="section">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add New User</h4>
                                </div>

                                <form method="POST" enctype="multipart/form-data">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-3">
                                                    <label for="user_name" class="form-label">Name</label>
                                                    <input class="form-control" type="text" id="user_name"
                                                        placeholder="Name" name="user_name" autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" type="email" id="email"
                                                        placeholder="example@something.com" name="email"
                                                        autocomplete="off" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input class="form-control" type="number" id="phone"
                                                        placeholder="Phone Number" name="phone">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control" type="password" id="password"
                                                        placeholder="Password" name="password" autocomplete="off"
                                                        autocomplete="new-password">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea name="address" id="address" rows="3"
                                                        class="form-control"></textarea>
                                                    <label class="form-label">Your current address</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-3">
                                                    <label for="birthday" class="form-label">Date Of Birth</label>
                                                    <input class="form-control" type="date" id="birthday"
                                                        name="birthday">

                                                </div>

                                                <div>
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <select name="gender" id="gender" class="form-select">
                                                        <option>Please Select Your Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="biodata" class="form-label">Biodata</label>
                                                    <textarea name="biodata" id="biodata" rows="2"
                                                        class="form-control"></textarea>
                                                    <label class="form-label">Write Your Biodata</label>
                                                </div>

                                                <div>
                                                    <label for="user_role" class="form-label">User Role</label>
                                                    <select name="user_role" id="user_role" class="form-select">
                                                        <option>Please Select User Role</option>
                                                        <option value="0" selected>Subscriber</option>
                                                        <option value="1">Editor</option>
                                                        <option value="2">Admin</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="photo" class="form-label">Choose Picture</label>
                                                    <input class="form-control" type="file" id="photo" name="photo">
                                                    <label class="form-label">Choose Picture that has (.png, .jpg,
                                                        .jpeg) extension...</label>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1 btn-lg"
                                                        name="add_user">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>


                        <?php 

                                    if(isset($_POST['add_user']))
                                    {
                                        $user_name      = $_POST['user_name'];
                                        $email          = $_POST['email'];
                                        $phone          = $_POST['phone'];
                                        $password       = $_POST['password'];
                                        $address        = $_POST['address'];
                                        $birthday       = $_POST['birthday'];
                                        $gender         = $_POST['gender'];
                                        $biodata        = $_POST['biodata'];
                                        $user_role      = $_POST['user_role'];
                                        $photo          = $_FILES['photo']['name'];
                                        $tmp_name       = $_FILES['photo']['tmp_name'];

                                    }

                                        if(empty($user_name) || empty($email) || empty($password) || empty($phone))
                                        {
                                            echo '<span>Name , Email , Phone , Password are Required!!!</span>';
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

                                                move_uploaded_file($tmp_name, 'assets/images/users/'.$updatedPhotoName);

                                                $updatedPassword = sha1($password);

                                                $addUserQuery = "INSERT INTO users (name, email, phone, address, birthday, gender, biodata, photo, password, user_role, status)
                                                VALUES('$user_name','$email','$phone','$address','$birthday','$gender','$biodata','$updatedPhotoName', '$updatedPassword', '$user_role','1')";

                                                $addUserQueryFeedback = mysqli_query($db,$addUserQuery);

                                                if($addUserQueryFeedback)
                                                {
                                                    header('Location: users.php');
                                                }
                                                else
                                                {
                                                    die('Add User Error  '.mysqli_error($db));
                                                }
                                            }
                                        }

                                ?>


                    </div>
                </section>
                <!-- Basic File Browser end -->
            </div>

        </div>

    </section>
</div>

<?php
    }

    if($do=='manage')
    {
        
        ?>


<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For user to check their list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            User Datatable
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>User Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                                    $u_query = "SELECT * FROM users";
                                                    $u_db_feedback = mysqli_query($db,$u_query);
                                                    $serial = 0;
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

                                                        $serial++;
                                                    ?>

                                    <tr>
                                        <td><?php echo $serial; ?></td>
                                        <td>
                                            <img src="assets/images/users/<?php echo $photo; ?>" alt="Sorry" width="40"
                                                class="circle" style="border-radius: 100%">
                                        </td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td>
                                            <?php 
                                                                    if($user_role==0) 
                                                                    {    
                                                                        echo '<span class="badge bg-success">Subscriber</span>';
                                                                    }
                                                                    if($user_role==1) 
                                                                    {    
                                                                        echo '<span class="badge bg-warning">Editor</span>';
                                                                    }
                                                                    if($user_role==2) 
                                                                    {    
                                                                        echo '<span class="badge bg-danger">Admin</span>';
                                                                    }
                                                                ?>
                                        </td>
                                        <td>
                                            <?php 
                                                                    if($status==0) 
                                                                    {    
                                                                        echo '<span class="badge bg-danger">InActive</span>';
                                                                    }
                                                                    if($status==1) 
                                                                    {    
                                                                        echo '<span class="badge bg-success">Active</span>';
                                                                    }
                                                                    
                                                                ?>
                                        </td>

                                        <td>
                                            <a type="button" data-toggle="tooltip" data-placement="top" title="Profile"
                                                href="profile.php?do=<?php echo $u_id; ?>">
                                                <i class="fa fa-eye ms-2 text-success" aria-hidden="true"></i>
                                            </a>

                                            <?php 
                                                                    $userRole = $_SESSION['loginUserRole'];
                                                                    if($userRole==2){
                                                                        ?>
                                            <a type="button" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="users.php?do=edit&edit_id=<?php echo $u_id; ?>">
                                                <i class="fa fa-pencil-square-o ms-2 text-warning"
                                                    aria-hidden="true"></i>
                                            </a>
                                            <?php
                                                                    }
                                                                ?>

                                            <?php 
                                                                    $userRole = $_SESSION['loginUserRole'];
                                                                    if($userRole==2){
                                                                        ?>
                                            <a type="button" data-toggle="tooltip" data-placement="top" title="Delete"
                                                href="users.php?do=delete&d_id=<?php echo $u_id; ?>">
                                                <i class="fa fa-trash ms-2 text-danger" aria-hidden="true"></i>
                                            </a>
                                            <?php
                                                                    }
                                                                ?>


                                        </td>
                                    </tr>
                                    <?php

                                                    }

                                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

        </div>

    </section>
</div>


<?php
    }

    if($do=='edit')
    {
        $edit_id = $_GET['edit_id'];
        //echo $_GET['edit_id'];
        $u_query = "SELECT * FROM users where u_id = '$edit_id'";
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
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">

                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit User</h3>
                            <p class="text-subtitle text-muted">Edit user into the database</p>
                        </div>

                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--Edit user form start -->

                <section class="section">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit User</h4>
                                </div>

                                <form method="POST" enctype="multipart/form-data" action="users.php?do=update">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-3">
                                                    <label for="user_name" class="form-label">Name</label>
                                                    <input class="form-control" type="text" id="user_name"
                                                        placeholder="Name" name="user_name" autocomplete="off"
                                                        value="<?php echo $name; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" type="email" id="email"
                                                        placeholder="example@something.com" name="email"
                                                        autocomplete="off" required value="<?php echo $email; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input class="form-control" type="number" id="phone"
                                                        placeholder="Phone Number" name="phone"
                                                        value="<?php echo $phone; ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control" type="password" id="password"
                                                        placeholder="Password" name="password" autocomplete="off"
                                                        autocomplete="new-password">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea name="address" id="address" rows="3" class="form-control"
                                                        value="<?php echo $address; ?>"><?php echo $address; ?></textarea>
                                                    <label class="form-label">Your current address</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="birthday" class="form-label">Date Of Birth</label>
                                                    <input class="form-control" type="date" id="birthday"
                                                        name="birthday" value="<?php echo $birthday; ?>">

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-12">

                                                <div>
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <select name="gender" id="gender" class="form-select">
                                                        <option>Please Select Your Gender</option>
                                                        <option value='Male'
                                                            <?php if($gender == 'Male') echo 'selected'; ?>>Male
                                                        </option>
                                                        <option value='Female'
                                                            <?php if($gender == 'Female') echo 'selected'; ?>>Female
                                                        </option>
                                                        <option value='Other'
                                                            <?php if($gender == 'Other') echo 'selected'; ?>>Other
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="biodata" class="form-label">Biodata</label>
                                                    <textarea name="biodata" id="biodata" rows="2" class="form-control"
                                                        value="<?php echo $biodata; ?>">
                                                                <?php echo $biodata; ?>
                                                                </textarea>
                                                    <label class="form-label">Write Your Biodata</label>
                                                </div>

                                                <div>
                                                    <label for="user_role" class="form-label">User Role</label>
                                                    <select name="user_role" id="user_role" class="form-select">
                                                        <option>Please Select User Role</option>
                                                        <option value="0" <?php if($user_role == 0) echo 'selected'; ?>>
                                                            Subscriber</option>
                                                        <option value="1" <?php if($user_role == 1) echo 'selected'; ?>>
                                                            Editor</option>
                                                        <option value="2" <?php if($user_role == 2) echo 'selected'; ?>>
                                                            Admin</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="status" class="form-label">Status</label>
                                                    <select name="status" id="status" class="form-select">
                                                        <option>Please Select User Status</option>
                                                        <option value="0" <?php if($status == 0) echo 'selected'; ?>>
                                                            InActive</option>
                                                        <option value="1" <?php if($status == 1) echo 'selected'; ?>>
                                                            Active</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Current Picture</label><br>
                                                    <img src="assets/images/users/<?php echo $photo; ?>"
                                                        alt="User Image" width="100" class="circle"
                                                        style="border-radius: 100%"> <br>

                                                    <label for="photo" class="form-label">Choose New Picture</label>
                                                    <input class="form-control" type="file" id="photo" name="photo">
                                                    <label class="form-label">Choose Picture that has (.png, .jpg,
                                                        .jpeg) extension...</label>
                                                </div>

                                                <input type="hidden" class="form-control" name="edit_user_id"
                                                    value=<?php echo $edit_id; ?>>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1 btn-lg"
                                                        name="edit_user">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Basic File Browser end -->
            </div>

        </div>

    </section>
</div>

<?php

    }

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
                    move_uploaded_file($tmp_photo_file, 'assets/images/users/'.$updatedEncryptedPhotoFile);

                    $tableName = 'users';
                    $deleteeId = $edit_user_id; 
                    $key = 'u_id';
                    deleteUserPhoto($tableName,$key, $deleteeId);

                    $updateQuery = "UPDATE users SET name='$updatedName', email = '$updatedEmail' , phone = '$updatedPhone', password='$updatedEncryptedPassword', 
                    address='$updatedAddress', birthday = '$updatedBirthday', gender = '$updatedGender', biodata='$updatedBiodata', user_role='$updatedUser_role',
                    photo = '$updatedEncryptedPhotoFile', status='$updatedStatus' WHERE u_id = '$edit_user_id'";

                    $updateQueryFeedback = mysqli_query($db,$updateQuery);

                    if($updateQueryFeedback)
                    {
                        header('Location: users.php');
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
                    move_uploaded_file($tmp_photo_file, 'assets/images/users/'.$updatedEncryptedPhotoFile);

                    // Deleting Photo file form Folder
                    $tableName = 'users';
                    $deleteeId = $edit_user_id; 
                    $key = 'u_id';
                    deleteUserPhoto($tableName,$key, $deleteeId);


                    $updateQuery = "UPDATE users SET name='$updatedName', email = '$updatedEmail' , phone = '$updatedPhone', 
                    address='$updatedAddress', birthday = '$updatedBirthday', gender = '$updatedGender', biodata='$updatedBiodata', user_role='$updatedUser_role',
                    photo = '$updatedEncryptedPhotoFile', status='$updatedStatus' WHERE u_id = '$edit_user_id' ";

                    $updateQueryFeedback = mysqli_query($db,$updateQuery);

                    if($updateQueryFeedback)
                    {
                        header('Location: users.php');
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
                    header('Location: users.php');
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
                        header('Location: users.php');
                    }
                    else
                    {
                        die('Unsuccesfull Attempt For Edit User Information...'.mysqli_error($db));
                    }
                
            }
            
        }
    }





    if($do=='delete')
    {
        if(isset($_GET['d_id']))
        {
            $delete_id = $_GET['d_id'];

            // Deleting Photo file form Folder
            $tableName = 'users';
            $deleteeId = $delete_id; 
            $key = 'u_id';
            deleteUserPhoto($tableName,$key, $deleteeId);
            
            $key = 'u_id';
            $url = 'users.php';

            // Delete User From Database
            deleteUser($tableName, $key, $deleteeId, $url);
        }
    }

?>




<?php

    include "inc/footer.php";
?>