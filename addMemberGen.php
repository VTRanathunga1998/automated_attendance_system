<?php

    session_start();

    include 'database.php';

    if(isset($_POST['addMember'])){
        $id = $_POST['id'];
        $role = $_POST['chooseRole'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $nic = $_POST['nic'];
        $email = $_POST['email'];
        $gender = $_POST['chooseGender'];
        $mobNum = $_POST['mobNum'];
        $faculty = $_POST['chooseFac'];
        $department = $_POST['chooseDep'];
    }

    $sql = "SELECT faculty.facName,department.depName FROM faculty INNER JOIN department ON department.facID = faculty.facID WHERE department.depID = '$department'";

        

        if(mysqli_query($connect,$sql)){
            $result = mysqli_query($connect,$sql);
            $resultRows = mysqli_num_rows($result);


            if($resultRows == 1){
                while($row = mysqli_fetch_assoc($result)){  

                    $faculty = $row['facName'];
                    $department = $row['depName']; 

                    $hashedPass = password_hash("@Abc123",PASSWORD_DEFAULT);

                    $sql = "INSERT INTO user(userName,password,role) VALUES('$id','$hashedPass','$role');";

                    if(!mysqli_query($connect,$sql)){
                        die('Invalid query: ' . mysql_error());
                    } else {
                        
                        if($role == "Admin"){
                            $sql = "INSERT INTO admin(adminID,firstName,lastName,faculty,nic,mobileNum,gender,email,department,userName) VALUES('$id','$fName' , '$lName' , '$faculty' , '$nic' , '$mobNum' , '$gender' , '$email' , '$department','$id');";
                    
                            if(!mysqli_query($connect,$sql)){
                                die('Invalid query: ' . mysql_error());
                            } else {
                                
                                header("Location:adminProfile.php?add=success");
                                exit();
                                
                            }
                        }elseif($role == "Student"){
                            $sql = "INSERT INTO student(RegNum,firstName,lastName,email,faculty,department,gender,mobileNum,userName,nic) VALUES('$id','$fName' , '$lName' , '$email' , '$faculty' , '$department' , '$gender' , '$mobNum','$id','$nic');";
                    
                            if(!mysqli_query($connect,$sql)){
                                die('Invalid query: ' . mysql_error());
                            } else {
                                
                                header("Location:adminProfile.php?add=success");
                                exit();
                                
                            }
                        }elseif($role == "Lecturer"){
                            $sql = "INSERT INTO lecturer(lecturerID,firstName,lastName,gender,nic,faculty,department,email,userName) VALUES('$id','$fName' , '$lName' , '$gender' , '$nic' , '$faculty' , '$department' , '$email','$id');";
                    
                            if(!mysqli_query($connect,$sql)){
                                die('Invalid query: ' . mysql_error());
                            } else {
                                
                                header("Location:adminProfile.php?add=success");
                                exit();
                                
                            }
                        }
                        
                    }
                       
                }
            } else{
                header("Location:adminProfile.php?create=failed");
                exit();
            }
            
        } else {

            die('Invalid query: ' . mysql_error());
            
        }
    

    

?>




    