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
                            <p class="text-subtitle text-muted">For Donar to check their list</p>
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
                            Donation History
                        </div>
                        <div class="card-body">
                            <table class="table  table-hover table-light" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Catagory</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Transaction Id</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                        $donation_query = "SELECT * FROM donationinfo";
                                        $donation_db_feedback = mysqli_query($db,$donation_query);
                                        $serial = 0;
                                        while($row = mysqli_fetch_assoc($donation_db_feedback))
                                        {
                                            // Retrieving Data from Database
                                            $name           = mysqli_real_escape_string($db,$row['d_name']);
                                            $email          = mysqli_real_escape_string($db,$row['d_email']);
                                            $catagory       = mysqli_real_escape_string($db,$row['d_catagory']);
                                            $amount         = mysqli_real_escape_string($db,$row['d_amount']);
                                            $message        = mysqli_real_escape_string($db,$row['d_message']);
                                            $t_id           = mysqli_real_escape_string($db,$row['t_id']);
                                            $t_date         = mysqli_real_escape_string($db,$row['t_date']);
                                            $t_method       = mysqli_real_escape_string($db,$row['t_method']);
                                            $t_status       = mysqli_real_escape_string($db,$row['t_status']);;

                                            $serial++;

                                            // printing Each Donation Info on Admin panel
                                            ?>
                                    <tr>
                                        <td scope="row"><?php echo $serial; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $catagory; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td><?php echo $t_id; ?></td>
                                        <td><?php echo $t_date; ?></td>
                                        <td><?php echo $t_method; ?></td>
                                        <td><?php echo $t_status; ?></td>
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
    include "inc/footer.php";
?>