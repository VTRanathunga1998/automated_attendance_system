<?php
    session_start();
    include_once 'database.php';
    $regNum = $_GET['regNum'];
    $id = $_GET['id'];
    $status = $_GET['present'];
    $sql = "UPDATE attendance SET present = $status WHERE sessionID = '$id' AND regNum = '$regNum';";
    if(mysqli_query($connect,$sql)){
        header("Location:updateAttendanceExecuteLiveSearch.php");
    } else {
        // echo 'Error';
    }
     
?>