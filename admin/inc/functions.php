<?php

function deleteUser($tableName, $key, $deleteId, $url){

        global $db;

        $deleteInfoQuery = "DELETE FROM $tableName WHERE $key = '$deleteId'";
        $deleteInfoQueryFeedback = mysqli_query($db,$deleteInfoQuery);

        if($deleteInfoQueryFeedback)
        {
            header('Location: '.$url);
        }
        else
        {
            die('Unsuccessful Attempt For User Deletion...'.mysqli_error($db));
        }


        // $deleteInfoQuery = "DELETE FROM users WHERE u_id = '$delete_id'";
        // $deleteInfoQueryFeedback = mysqli_query($db,$deleteInfoQuery);

        // if($deleteInfoQueryFeedback)
        // {
        //     header('Location: users.php');
        // }
        // else
        // {
        //     die('Unsuccessful Deletion...'.mysqli_error($db));
        // }
}

function deleteUserPhoto($tableName, $key, $deleteId){

    global $db;

    $deletePhotoQuery = "SELECT photo FROM $tableName WHERE $key = '$deleteId'";
    $deletePhotoQueryFeedback = mysqli_query($db,$deletePhotoQuery);
    while($row = mysqli_fetch_assoc($deletePhotoQueryFeedback))
    {
        $deletePhotoName = $row['photo'];
    }

    unlink('assets/images/users/'.$deletePhotoName);
 
    // Example
    // $deletePhotoQuery = "SELECT photo FROM users WHERE u_id = '$delete_id'";
    // $deletePhotoQueryFeedback = mysqli_query($db,$deletePhotoQuery);
    // while($row = mysqli_fetch_assoc($deletePhotoQueryFeedback))
    // {
    //     $deletePhotoName = $row['photo'];
    // }

    // unlink('assets/images/users/'.$deletePhotoName);
}




?>