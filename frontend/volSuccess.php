<?php  
	include "inc/header.php";


    
    // code for updating verification status on database (0->1) if link was clicked
    if (isset($_GET['Verification'])) {
    $raquet = mysqli_query($db, "SELECT * FROM volunteer WHERE CodeV='{$_GET['Verification']}'");
    if (mysqli_num_rows($raquet) > 0) {
        $query = mysqli_query($db, "UPDATE volunteer SET verification='1' WHERE CodeV='{$_GET['Verification']}'");
        if ($query) {
        $rowv = mysqli_fetch_assoc($raquet);
        header("Location: volSuccess.php");
        }else{
        header("Location: volunteer.php");
        }
    } else {
        header("Location: volunteer.php");
    }
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
    font-size: 20px;
    margin: 0;
}

i {
    color: #9ABC66;
    font-size: 100px;
    line-height: 200px;
    margin-left: -15px;
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
        <h1>Registration Successful</h1>
        <p>Welcome to our volunteer family<br /> Thank You !</p>
    </div>

</body>


<?php  
	include "inc/footer.php";

?>