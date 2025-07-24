
<?php  
	include "inc/header.php";

?>


<?php

$query = "SELECT p_key FROM donationinfo ORDER BY p_key DESC LIMIT 1";

$result = mysqli_query($db, $query);
if ($result) 
{
  $row = mysqli_fetch_assoc($result);
  $p_key = $row['p_key'];
  
  // Use the value as needed
  //echo "The value of the last primary key is: " . $p_key;
} 
else 
{
    // Handle query error
    echo "Error: " . mysqli_error($connection);
}

$dq = "DELETE FROM `donationinfo` WHERE p_key = '$p_key'";
$dqFeedback = mysqli_query($db, $dq);

if($dqFeedback)
{

}
else
{
    echo "Inserted info deletion unsuccessful";
}

?>

  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
        margin-bottom: 30px;
      }

      .tryAgain{
        background-color: #ffc952 !important;
        color: #444444 !important;
        
        width:200px;
        margin: 10px auto 0 auto;
        padding: 10px 10px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 400;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        outline: none;
        
    }
    

    </style>


    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F5B7B1; margin:0 auto;">
        <i style="color: #CD5C5C;">!</i>
      </div>
        <h1 style="color: #CD5C5C;">Failure</h1> 
        <p style="color: #FF6666;">Oops! Something went wrong.<br/> While trying to reserve money from your account</p>

        <a href="donation2.php"><button class="tryAgain">Try Again</button></a>
      </div>


    </body>


<?php  
	include "inc/footer.php";

?>
