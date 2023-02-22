<?php

    session_start();

    include 'database.php';
    
    if(isset($_POST['updateAttendance'])){
        $faculty = $_POST['chooseFac'];
        $department = $_POST['chooseDep'];
        $activityType = $_POST['chooseActType'];
        $subject = $_POST['chooseSub'];
        $semester = $_POST['chooseSem'];
        $batch = $_POST['chooseBatch'];

        $date = $_POST['chooseDate'];  

        $timeStartHH = $_POST['timeStartHH'];
        $timeStartMM = $_POST['timeStartMM'];

        $timeEndHH = $_POST['timeEndHH'];
        $timeEndMM = $_POST['timeEndMM'];


        $timeStart = $timeStartHH.':'.$timeStartMM.':00' ;

        $timeEnd = $timeEndHH.':'.$timeEndMM.':00' ;   


            $sql = "SELECT faculty.facName,department.depName FROM faculty INNER JOIN department ON department.facID = faculty.facID WHERE department.depID = '$department'"; //covert value to text content

        

            if(mysqli_query($connect,$sql)){
                $result = mysqli_query($connect,$sql);
                $resultRows = mysqli_num_rows($result);


                if($resultRows == 1){
                    while($row = mysqli_fetch_assoc($result)){  

                        $faculty = $row['facName'];
                        $department = $row['depName']; 

                        $sql = "SELECT sessionID FROM session WHERE faculty = '$faculty' AND batch = '$batch' AND activityType = '$activityType' AND subject = '$subject' AND semester = '$semester' AND department = '$department' AND date = '$date' AND timeStart = '$timeStart' AND timeEnd = '$timeEnd';" ;

                        $result = mysqli_query($connect,$sql);
                        $resultRows = mysqli_num_rows($result);

                        if($resultRows > 0){
                            while($row=mysqli_fetch_assoc($result)){
                                $sessionID = $row['sessionID'];
                                $_SESSION["sessionID"] = $sessionID;
                                header("Location:updateAttendanceExecuteLiveSearch.php");
                                exit();
                            }
                        } else {
                            echo '<script>if(confirm("Data does not exist")) document.location = "adminSettingHome.php";</script>';
                            exit();
                        }

                        
                    }
                } else{
                    echo '<script>if(confirm("Operation failed!..")) document.location = "adminProfile.php";</script>';
                    exit();
                }
                
            } else {

                die('Invalid query: ' . mysql_error());
                
            }
        } 

?>



