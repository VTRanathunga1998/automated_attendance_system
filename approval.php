<?php

    session_start();
    if(empty($_SESSION['userName']) || $_SESSION['role'] != 'Admin'){
        header("Location:logindenied.php");
    }

    include 'database.php';

    if(isset($_POST['register'])){

         // Validate password strength
         $uppercase    = preg_match('@[A-Z]@', $_POST['password']);
         $lowercase    = preg_match('@[a-z]@', $_POST['password']);
         $number       = preg_match('@[0-9]@', $_POST['password']);
         $specialchars = preg_match('@[^\w]@', $_POST['password']);

        if($_POST['password'] != $_POST['confirmPassword']){
            $_SESSION['status'] = "Password is mismatch";
            $_SESSION['state'] = "danger";
            header("Location:register.php?password=mismatch");
            exiit();
        } elseif(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($_POST['password']) < 8){
            $_SESSION['status'] = "Password is too weak. At least 8-12 characters long but 14 or more is better. A combination of uppercase letters, lowercase letters, numbers, and symbols";
            $_SESSION['state'] = "danger";
            header("Location:register.php");
            exiit();
        } else {

            $role = $_POST['chooseRole'];
            $id = $_POST['id'];
            $firstName = $_POST['fName'];
            $lastName = $_POST['lName'];
            $nic = $_POST['nic'];
            $mobile = $_POST['mobNum'];
            $email = $_POST['email'];
            $faculty = $_POST['chooseFac'];
            $department = $_POST['chooseDep'];
            $gender = $_POST['chooseGender'];
            
            if(isset($_POST['chooseBatch'])){
                $batch = $_POST['chooseBatch'];
            } else {
                $batch = "";
            }

            $profilePic = addslashes(file_get_contents($_FILES['profilePic']['tmp_name']));
            $password = $_POST['password'];
            $securePassword = password_hash($password,PASSWORD_DEFAULT);

            
            $sql = "SELECT faculty.facName,department.depName FROM faculty INNER JOIN department ON department.facID = faculty.facID WHERE department.depID = '$department'";

                

            if(mysqli_query($connect,$sql)){
                $result = mysqli_query($connect,$sql);
                $resultRows = mysqli_num_rows($result);


                if($resultRows == 1){
                    while($row = mysqli_fetch_assoc($result)){  

                        $faculty = $row['facName'];
                        $department = $row['depName'];

                        $sql = "INSERT INTO approve(id,role,firstName,lastName,nic,mobile,email,faculty,department,gender,profilePic,password,batch) VALUES('$id','$role','$firstName','$lastName','$nic','$mobile','$email','$faculty','$department','$gender','$profilePic','$securePassword','$batch' )";

                        if(mysqli_query($connect,$sql)){                           
                            // echo '<script>if(confirm("Your request is pending")) document.location = "index.php";</script>';
                            $_SESSION['status'] = "Your request is pending";
                            $_SESSION['state'] = "success";
                            header("Location:login.php");
                            exiit();                       
                        } else {               
                            echo '<script>if(confirm("Database Error")) document.location = "index.php";</script>';
                            exiit();                          
                        }
                    }    
                } else {
                    echo '<script>if(confirm("Database Error")) document.location = "index.php";</script>';
                    exiit();
                }

            } else {
                echo '<script>if(confirm("Database Error")) document.location = "index.php";</script>';
                exiit();
            }
        } 
    }       
?>

