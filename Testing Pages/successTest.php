

<?php  
	include "inc/header.php";

?>

<?php

    $val_id=urlencode($_POST['val_id']);
    $store_id=urlencode("chari6491579b6bc58");
    $store_passwd=urlencode("chari6491579b6bc58@ssl");
    $requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $requested_url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

    $result = curl_exec($handle);

    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if($code == 200 && !( curl_errno($handle)))
    {

        # TO CONVERT AS ARRAY
        # $result = json_decode($result, true);
        # $status = $result['status'];

        # TO CONVERT AS OBJECT
        $result = json_decode($result);

        # TRANSACTION INFO
        $status = $result->status;
        $tran_date = $result->tran_date;
        $tran_id = $result->tran_id;
        $val_id = $result->val_id;
        $amount = $result->amount;
        $store_amount = $result->store_amount;
        $bank_tran_id = $result->bank_tran_id;
        $card_type = $result->card_type;

        # EMI INFO
        $emi_instalment = $result->emi_instalment;
        $emi_amount = $result->emi_amount;
        $emi_description = $result->emi_description;
        $emi_issuer = $result->emi_issuer;

        # ISSUER INFO
        $card_no = $result->card_no;
        $card_issuer = $result->card_issuer;
        $card_brand = $result->card_brand;
        $card_issuer_country = $result->card_issuer_country;
        $card_issuer_country_code = $result->card_issuer_country_code;

        # API AUTHENTICATION
        $APIConnect = $result->APIConnect;
        $validated_on = $result->validated_on;
        $gw_version = $result->gw_version;

        if(!empty($_SESSION['loginEmail']))
        {
          $donar_id = $_SESSION['loginUserId'];
        }
        else
        {
          $donar_id = 0;
        }
                  
		    $d_amount    		= $_POST['amount'];
									
        $donationInfo = "UPDATE donationinfo SET d_amount = '$d_amount', donation_status = 'Complete', t_id = '$tran_id', t_date = '$tran_date', t_status = '$status', t_method = '$card_type' WHERE d_id = '$donar_id'";

        
        $feedback = mysqli_query($db, $donationInfo);

        if($feedback)
        {
            
        }
        else
        {
          echo "Failed!";
        }


        // $name       = mysqli_real_escape_string($db,$_POST['name']);
        // //$catagory       = mysqli_real_escape_string($db,$_POST['catagory']);
        // $email      = mysqli_real_escape_string($db,$_POST['email']);
        // $d_amount      = mysqli_real_escape_string($db,$_POST['amount']);
        // //$message      = mysqli_real_escape_string($db,$_POST['message']);

        // echo $name.$d_amount.$email;


        // $dQuery = "INSERT INTO donationinfo (d_id, d_name, d_email,d_amount,donation_status, t_id, t_date, t_status, t_method) 
        // VALUES ('$donar_id','$name','$email','$d_amount','Complete','$tran_id','$tran_date','$status','$card_type')";

        // $dQueryFeedback = mysqli_query($db,$dQuery);

        // if($dQueryFeedback){
        	
        // }
        // else{
        // 	die('Donation Error !'.mysqli_error($db));
        // }
        

    } 
    else 
    {
      echo "Failed to connect with SSLCOMMERZ";
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
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We Received Your Donation;<br/> Thank You !</p>
      </div>

    </body>


<?php  
	include "inc/footer.php";

?>
