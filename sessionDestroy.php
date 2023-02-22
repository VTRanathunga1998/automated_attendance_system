<?php 
    session_start();
    unset($_SESSION['sessionID']);
    header("Location:adminTakeAttendance.php");
?>