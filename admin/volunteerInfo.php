<?php 
    include "inc/header.php";
?>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For Volunteer to check their list</p>
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
                            Volunteers Infomation
                        </div>
                        <div class="card-body">
                            <table class="table  table-hover table-light" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Birthday</th>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Availability</th>
                                        <th scope="col">Skills</th>
                                        <th scope="col">Volunteering Period</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Reference</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                        $volunteer_query = "SELECT * FROM volunteer";
                                        $volunteer_db_feedback = mysqli_query($db,$volunteer_query);
                                        $serial = 0;
                                        while($row = mysqli_fetch_assoc($volunteer_db_feedback))
                                        {
                                            // Retrieving Data from Database
                                            $name           = mysqli_real_escape_string($db,$row['name']);
                                            $email          = mysqli_real_escape_string($db,$row['email']);
                                            $phone       = mysqli_real_escape_string($db,$row['phone']);
                                            $gender         = mysqli_real_escape_string($db,$row['gender']);
                                            $birthday        = mysqli_real_escape_string($db,$row['birthdate']);
                                            $bloodGroup           = mysqli_real_escape_string($db,$row['bloodGroup']);
                                            $address         = mysqli_real_escape_string($db,$row['address']);
                                            $availability       = mysqli_real_escape_string($db,$row['availability']);
                                            $skills       = mysqli_real_escape_string($db,$row['skills']);
                                            $volunteering_period       = mysqli_real_escape_string($db,$row['volunteering_period']);
                                            $message       = mysqli_real_escape_string($db,$row['message']);
                                            $reference       = mysqli_real_escape_string($db,$row['reference']);
                                            $verification       = mysqli_real_escape_string($db,$row['verification']);

                                            $serial++;

                                            // printing Each Donation Info on Admin panel
                                            if($verification==1){

                                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $serial; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <td><?php echo $birthday; ?></td>
                                        <td><?php echo $bloodGroup; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $availability; ?></td>
                                        <td><?php echo $skills; ?></td>
                                        <td><?php echo $volunteering_period; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td><?php echo $reference; ?></td>
                                    </tr>
                                    <?php
                                            }
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
    include "inc/footer.php";
?>