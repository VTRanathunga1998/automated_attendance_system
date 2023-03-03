<?php
    session_start();
    include_once 'database.php';
    $id = $_GET['id'];
    $status = $_GET['action'];


    $sql = "SELECT * FROM approve WHERE id = '$id'";

    $result = mysqli_query($connect,$sql);
    $resultRows = mysqli_num_rows($result);

    if($resultRows == 1){


        $row = mysqli_fetch_array($result);

        $role = $row['role'];
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $nic = $row['nic'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $faculty = $row['faculty'];
        $department = $row['department'];
        $gender = $row['gender'];
        $batch = $row['batch'];
        $profilePic = base64_encode( $row['profilePic'] );
        $password = $row['password'];
        // $securePassword = password_hash($password,PASSWORD_DEFAULT);

        if($status == "accept"){

            $sql = "INSERT INTO user(userName,password,role) VALUES('$id','$password','$role')";

            if(mysqli_query($connect,$sql)){
                if($role="Student"){
                    $query = "INSERT INTO student(RegNum,department,faculty,lastName,email,batch,profilePic,firstName,gender,nic,mobileNum,userName) VALUES('$id','$department','$faculty','$lastName','$email','$batch','$profilePic','$firstName','$gender','$nic','$mobile','$id')";
                } else {
                    $query = "INSERT INTO lecturer(lecturerID,lastName,gender,firstName,nic,department,faculty,profilePic,email,mobileNum,userName) VALUES('$id','$lastName','$gender','$firstName','$nic','$department','$faculty','$profilePic','$email','$mobile','$id')";
                }

                if(mysqli_query($connect,$query)){
                    $sql = "DELETE FROM approve WHERE id = '$id' ";

                    if(mysqli_query($connect,$sql)){
                        echo '<script>if(confirm("Added Successfully")) document.location = "approvalExecution.php";</script>';
                        exit();
                    } else {
                        echo '<script>if(confirm("Database Error")) document.location = "approvalExecution.php";</script>';
                        exit();
                    }
                    
                } else {
                    echo '<script>if(confirm("Database Error")) document.location = "approvalExecution.php";</script>';
                    exit();
                }

            } else {
                echo '<script>if(confirm("Database Error")) document.location = "approvalExecution.php";</script>';
                exit();
            }

        } else {

            $sql = "DELETE FROM approve WHERE id = '$id' ";

            if(mysqli_query($connect,$sql)){
                echo '<script>if(confirm("Deleted Successfully")) document.location = "approvalExecution.php";</script>';
                exit();
            } else {
                echo '<script>if(confirm("Database Error")) document.location = "approvalExecution.php";</script>';
                exit();
            }
        }
    } else {
        echo '<script>if(confirm("Member does not exist")) document.location = "approvalExecution.php";</script>';
        exit();
    }
?>