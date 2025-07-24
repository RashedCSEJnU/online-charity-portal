<?php 

    include "inc/header.php";

?>


            
<div class="page-heading">
    <h3>All Catagories</h3>
</div>



<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="col-12 col-xl-12">
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
                                            while($infoRow = mysqli_fetch_assoc($feedbackInfo))
                                            {
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

    </section>

</div>


<?php
 
   include "inc/footer.php";
?>