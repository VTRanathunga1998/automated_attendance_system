<?php
    session_start();

    include_once 'database.php';

    if(isset($_POST['qrcode'])){
        $code = $_POST['qrcode'];
        $mycode =  strval($code);
        $sessionId = $_SESSION['sessionID'];
        $present = 1;


        $sql = "SELECT regNum FROM attendance WHERE (sessionID = '$sessionId' AND regNum = '$code')";

        $result = mysqli_query($connect,$sql);
        $resultRows = mysqli_num_rows($result);


        if($resultRows == 1){        
            header("Location:scanQR.php");
        } else{
            $sql = "INSERT INTO attendance (regNum,present,sessionID,timeIn) VALUES('$mycode','$present','$sessionId',NOW())";

            if($connect->query($sql) === TRUE){   
                header("Location:scanQR.php");
            } else {
                echo 'Error';
            }
        }

    } else {
        echo 'Error';    
    }

    // $connection->close();

?>


