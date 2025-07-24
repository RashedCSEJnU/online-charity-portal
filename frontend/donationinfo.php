<?php  
	include "inc/header.php";

    if(empty($_SESSION['loginEmail'])){
        header('Location: login.php');
      }
      
      $loginEmail = $_SESSION['loginEmail'];
?>

<body>
    <div class="donationInfo">
        <div class="container mt-100">
            <table class="table table-hover" style="color: #000">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Message</th>
                        <th scope="col">Transaction Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Method</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 

                    $userDonationInfo = "SELECT * FROM donationinfo where d_email = '$loginEmail'";
                    $feedback = mysqli_query($db, $userDonationInfo);
                    $serial = 0;
                    while($row = mysqli_fetch_assoc($feedback))
                    {
                        $name        = $row['d_name'];
                        $catagory        = $row['d_catagory'];
                        $message       = $row['d_message'];
                        $amount     = $row['d_amount'];
                        $t_id    = $row['t_id'];
                        $t_date      = $row['t_date'];
                        $t_method     = $row['t_method'];
                        $t_status     = $row['t_status'];
                        $serial++;

                        if($t_status=="VALID"){
                            ?>

                    <tr>
                        <th scope="row"><?php echo $serial ?></th>
                        <td><?php echo $name ?></td>
                        <td><?php echo $catagory ?></td>
                        <td><?php echo $amount ?></td>
                        <td><?php echo $message ?></td>
                        <td><?php echo $t_id ?></td>
                        <td><?php echo $t_date ?></td>
                        <td><?php echo $t_method ?></td>
                    </tr>
                    <?php
                        }
                        else{
                            $serial--;
                        }
                    }
                    
                ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script> -->
</body>


<?php  
	include "inc/footer.php";
?>