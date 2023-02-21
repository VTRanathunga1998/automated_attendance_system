<?php

    session_start();

    include_once 'database.php';

    if(isset($_GET['attendanceID'])){
        $userName = mysqli_real_escape_string($connect,$_GET['attendanceID']);


        if($userName == $_SESSION['userName']){
            header("Location:adminProfile.php");
        } else {
            $sql = "";

            $result = mysqli_query($connect, $sql);

            if($result){
                header("Location:#.php?msg=user_deleted");
            } else {
                header("Location:adminProfile.php?msg=attendance_update_fail"); 
            }

        }
    }

?>