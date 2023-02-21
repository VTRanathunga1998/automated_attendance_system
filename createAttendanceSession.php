<?php

    session_start();

    include 'database.php';

    if(isset($_POST['newSession'])){
        $faculty = $_POST['chooseFac'];
        $department = $_POST['chooseDep'];
        $activityType = $_POST['chooseActType'];
        $subject = $_POST['chooseSub'];
        $semester = $_POST['chooseSem'];
        $batch = $_POST['chooseBatch'];

        $timeStartHH = $_POST['timeStartHH'];
        $timeStartMM = $_POST['timeStartMM'];
        $timeStartAMPM = $_POST['timeStartAMPM'];
        $timeEndHH = $_POST['timeEndHH'];
        $timeEndMM = $_POST['timeEndMM'];
        $timeEndAMPM = $_POST['timeEndAMPM'];

        $date = date("Y/m/d");

        $timeStart = $timeStartHH.':'.$timeStartMM.':'.$timeStartAMPM ;

        $timeEnd = $timeEndHH.':'.$timeEndMM.':'.$timeEndAMPM ;


    }

    $sql = "SELECT faculty.facName,department.depName FROM faculty INNER JOIN department ON department.facID = faculty.facID WHERE department.depID = '$department'";

    

    if(!mysqli_query($connect,$sql)){
        die('Invalid query: ' . mysql_error());
    } else {

        $result = mysqli_query($connect,$sql);
        $resultRows = mysqli_num_rows($result);

        if($resultRows == 1){
            while($row = mysqli_fetch_assoc($result)){  
               $facultyn = $row['facName'];
               $departmentn = $row['depName'];
               
               $sql = "INSERT INTO session(faculty,department,activityType,subject,semester,batch,date,timeStart,timeEnd) VALUES('$facultyn','$departmentn' , '$activityType' , '$subject' , '$semester' , '$batch' , '$date' , '$timeStart' , '$timeEnd');";

               if(!mysqli_query($connect,$sql)){
                    die('Invalid query: ' . mysql_error());
               } else {
                    
                    $sql = "SELECT sessionID FROM session WHERE faculty = '$facultyn' && department = '$departmentn' && activityType = '$activityType' && subject = '$subject' && semester = '$semester' && batch = '$batch' && timeStart = '$timeStart' && timeEnd = '$timeEnd' && date='$date'" ;

                    $result = mysqli_query($connect,$sql);
                    $resultRows = mysqli_num_rows($result);
            
                    if($resultRows > 0){
                        while($row = mysqli_fetch_assoc($result)){  
                            $_SESSION['sessionID'] = $row['sessionID'];
                            header("Location:scanQR.php?create=successful"); 
                            exit();
                        }
                    } else{
                        header("Location:adminProfile.php?create=failed");
                        exit();
                    }
                
               }

            }
        }
   
    }

?>






