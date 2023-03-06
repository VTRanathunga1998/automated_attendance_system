<?php

    session_start();

    include 'database.php';

    if(isset($_SESSION['userName'])){

        $uName = $_SESSION['userName'];

        if(isset($_POST['changedPass'])){
            $currentPass = $_POST['currentPass'];
            $newPass = $_POST['newPass'];
            $securePassword = password_hash($newPass,PASSWORD_DEFAULT);
            $confirmPass = $_POST['confirmPass'];
            
             // Validate password strength
            $uppercase    = preg_match('@[A-Z]@', $newPass);
            $lowercase    = preg_match('@[a-z]@', $newPass);
            $number       = preg_match('@[0-9]@', $newPass);
            $specialchars = preg_match('@[^\w]@', $newPass);

            
                $sql = "SELECT * FROM user WHERE userName='$uName';";

                $result = mysqli_query($connect,$sql);
                $resultRow = mysqli_num_rows($result);

                if($resultRow > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        if($currentPass != '' && $newPass != '' && $confirmPass != ''){

                                    if(password_verify($currentPass,$row['password'])){
                                        
                                        if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($newPass) < 8) {
                                            if($row['role'] == 'Student'){
                                                echo '<script>if(confirm("Password is too weak. At least 8-12 characters long but 14 or more is better. A combination of uppercase letters, lowercase letters, numbers, and symbols")) document.location = "studentPassChange.php";</script>';
                                                exiit();
                                            } elseif($row['role'] == 'Admin'){
                                                echo '<script>if(confirm("Password is too weak. At least 8-12 characters long but 14 or more is better. A combination of uppercase letters, lowercase letters, numbers, and symbols")) document.location = "adminPassChange.php";</script>';
                                                exiit();
                                            } else{
                                                echo '<script>if(confirm("Password is too weak. At least 8-12 characters long but 14 or more is better. A combination of uppercase letters, lowercase letters, numbers, and symbols")) document.location = "lecturerPassChange.php";</script>';
                                                exiit();
                                            }
            
                                            
                                          } else {
                                            if($newPass == $confirmPass){
                                                $sql = "UPDATE user SET password = '$securePassword' WHERE userName = '$uName';";
                                                mysqli_query($connect,$sql);
                                                if($row['role'] == 'Student'){
                                                    echo '<script>if(confirm("Your password has been changed successfully")) document.location = "studentProfile.php";</script>';
                                                    exiit();
                                                } elseif($row['role'] == 'Admin'){
                                                    echo '<script>if(confirm("Your password has been changed successfully")) document.location = "adminProfile.php";</script>';
                                                    exiit();
                                                } else{
                                                    echo '<script>if(confirm("Your password has been changed successfully")) document.location = "lecturerProfile.php";</script>';
                                                    exiit();
                                                }
                                            } else {
                                                if($row['role'] == 'Student'){
                                                    echo '<script>if(confirm("The password comfirmation does not match")) document.location = "studentPassChange.php";</script>';
                                                    exiit();
                                                } elseif($row['role'] == 'Admin'){
                                                    echo '<script>if(confirm("The password comfirmation does not match")) document.location = "adminPassChange.php";</script>';
                                                    exiit();
                                                } else{
                                                    echo '<script>if(confirm("The password comfirmation does not match")) document.location = "lecturerPassChange.php";</script>';
                                                    exiit();
                                                }
                                                
                                            }
                                          }  
                                    
                                    

                                    } else{
                                        if($row['role'] == 'Student'){
                                            echo '<script>if(confirm("Incorrect password")) document.location = "studentPassChange.php";</script>';
                                            exiit();
                                        } elseif($row['role'] == 'Admin'){
                                            echo '<script>if(confirm("Incorrect password")) document.location = "adminPassChange.php";</script>';
                                            exiit();
                                        } else{
                                            echo '<script>if(confirm("Incorrect password")) document.location = "lecturerPassChange.php";</script>';
                                            exiit();
                                        }
                                        
                                    }
                                        
                        } else {
                            if($row['role'] == 'Student'){
                                echo '<script>if(confirm("The fields cannot be empty!")) document.location = "studentPassChange.php";</script>';
                                exiit();
                            } elseif($row['role'] == 'Admin'){
                                echo '<script>if(confirm("The fields cannot be empty!")) document.location = "adminPassChange.php";</script>';
                                exiit();
                            } else{
                                echo '<script>if(confirm("The fields cannot be empty!")) document.location = "lecturerPassChange.php";</script>';
                                exiit();
                            }
                            
                        }
                    }
                } else {
                    if($row['role'] == 'Student'){
                        echo '<script>if(confirm("Data doesnot exist")) document.location = "studentPassChange.php";</script>';
                        exiit();
                    } elseif($row['role'] == 'Admin'){
                        echo '<script>if(confirm("Data doesnot exist")) document.location = "adminPassChange.php";</script>';
                        exiit();
                    } else{
                        echo '<script>if(confirm("Data doesnot exist")) document.location = "lecturerPassChange.php";</script>';
                        exiit();
                    }
                    
                }


            
        } else {
             if($row['role'] == 'Student'){
                                echo '<script>if(confirm("Oops!,Something went wrong. Try again..")) document.location = "studentPassChange.php";</script>';
                                exiit();
                            } elseif($row['role'] == 'Admin'){
                                echo '<script>if(confirm("Oops!,Something went wrong!  Try again..")) document.location = "adminPassChange.php";</script>';
                                exiit();
                            } else{
                                echo '<script>if(confirm("Oops!,Something went wrong!  Try again..")) document.location = "lecturerPassChange.php";</script>';
                                exiit();
                            }
        }
    } else {
         if($row['role'] == 'Student'){
                                echo '<script>if(confirm("Oops!,Something went wrong!  Try again..")) document.location = "studentPassChange.php";</script>';
                                exiit();
                            } elseif($row['role'] == 'Admin'){
                                echo '<script>if(confirm("Oops!,Something went wrong!  Try again..")) document.location = "adminPassChange.php";</script>';
                                exiit();
                            } else{
                                echo '<script>if(confirm("Oops!,Something went wrong!  Try again..")) document.location = "lecturerPassChange.php";</script>';
                                exiit();
                            }
    }
        
  
?>


