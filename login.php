<?php

    session_start();

    include_once 'database.php';

    if(isset($_POST['submit'])){
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $securePassword = password_hash($password,PASSWORD_DEFAULT);
        $role = $_POST['role'];


        $sql = "SELECT * FROM user WHERE userName = '$userName';";

        $result = mysqli_query($connect,$sql);
        $resultRows = mysqli_num_rows($result);



        if($resultRows > 0){
            while($row = mysqli_fetch_assoc($result)){  
                if(password_verify($password,$row['password'])){
                    $_SESSION['userName'] = $_POST['username']; //Session created

                    if($role == 'Student' && $row['role'] == 'Student'){
                        header("Location:studentProfile.php?login=success");
                        exit();
                    } 
                    elseif($role == 'Admin' && $row['role'] == 'Admin'){
                        header("Location:adminProfile.php?login=success");
                        exit();
                    } elseif($role == 'Lecturer' && $row['role'] == 'Lecturer') {
                        header("Location:lecturerProfile.php?login=success");
                        exit();
                    } else {
                        echo '<script>if(confirm("Role does not match")) document.location = \'index.php?password=incorrect\';</script>';
                        exit();
                    }
                } else {
                    echo '<script>if(confirm("Password is mismatch")) document.location = \'index.php?password=incorrect\';</script>';
                    // header("Location:index.php?password=incorrect");
                    exit();
                }
            }
        } else{
            echo '<script>if(confirm("Somethig went wrong!")) document.location = \'index.php?password=incorrect\';</script>';
            // header("Location:index.php?login=failed");
            exit();
        }
    }

?>