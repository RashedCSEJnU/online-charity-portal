<?php
    
    $db = mysqli_connect('localhost', 'root', '', 'charity');
    if($db){
        //echo "connection Established";
    }
    else{
        echo "connection failed";
    }

?>