<?php
    session_start();

    include_once 'database.php';

    if(isset($_POST['qrcode'])){
        $code = $_POST['qrcode'];
        $mycode =  strval($code);
        $sessionId = $_SESSION['sessionID'];
        $present = 1;

        $sql = "SELECT faculty,department,batch FROM session WHERE sessionID = '$sessionId' ";
        $result = mysqli_query($connect,$sql);
        $resultRows = mysqli_num_rows($result);

        if($resultRows == 1){
            while($row=mysqli_fetch_assoc($result)){
                $faculty = $row['faculty'];
                $department = $row['department'];
                $batch = $row['batch'];

                $sql = "SELECT RegNum FROM student WHERE faculty = '$faculty' AND department = '$department' AND batch = '$batch' AND RegNum = '$code'";

                $result = mysqli_query($connect,$sql);
                $resultRows = mysqli_num_rows($result);

                if($resultRows == 1){
                    $sql = "SELECT regNum FROM attendance WHERE (sessionID = '$sessionId' AND regNum = '$code')"; //check the register number is already added

                    $result = mysqli_query($connect,$sql);
                    $resultRows = mysqli_num_rows($result);


                    if($resultRows == 1){  
                        echo '<script>if(confirm("Already added")) document.location = \'scanQR.php\';</script>';      
                        // header("Location:scanQR.php");
                    } else{
                        $sql = "INSERT INTO attendance (regNum,present,sessionID,timeIn) VALUES('$mycode','$present','$sessionId',NOW())";

                        if($connect->query($sql) === TRUE){   
                            header("Location:scanQR.php");
                        } else {
                            echo 'Error';
                        }
                    }
                } else {
                    echo '<script>if(confirm("The member does not exist")) document.location = \'scanQR.php\';</script>';
                    exit();
                }

            }
        }

        

    } else {
        echo 'Error';    
    }

    // $connection->close();

?>


$sql = "SELECT regNum FROM attendance WHERE (sessionID = '$sessionId' AND regNum = '$code')"; //check the register number is already added

        $result = mysqli_query($connect,$sql);
        $resultRows = mysqli_num_rows($result);


        if($resultRows == 1){  
            echo '<script>if(confirm("Already added")) document.location = \'scanQR.php\';</script>';      
            // header("Location:scanQR.php");
        } else{
            $sql = "INSERT INTO attendance (regNum,present,sessionID,timeIn) VALUES('$mycode','$present','$sessionId',NOW())";

            if($connect->query($sql) === TRUE){   
                header("Location:scanQR.php");
            } else {
                echo 'Error';
            }
        }