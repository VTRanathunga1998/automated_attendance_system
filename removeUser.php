<?php

    session_start();

    include_once 'database.php';

    if(isset($_GET['userName'])){
        $userName = mysqli_real_escape_string($connect,$_GET['userName']);


        if($userName == $_SESSION['userName']){
            header("Location:adminProfile.php");
        } else {
            $sql = "DELETE FROM user WHERE userName = '$userName' ";

            $result = mysqli_query($connect, $sql);

            if($result){
                header("Location:adminSettingRemoveMembers.php?msg=user_deleted");
            } else {
                header("Location:adminProfile.php?msg=user_deleted_fail"); 
            }

        }
    }

?>