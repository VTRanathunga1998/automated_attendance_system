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

            if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($newPass) < 8) {
                header("Location:adminPassChange.php?status=unsuccess");
                exiit();
                
              } else {
                $sql = "SELECT * FROM user WHERE userName='$uName';";

                $result = mysqli_query($connect,$sql);
                $resultRow = mysqli_num_rows($result);

                if($resultRow > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        if($currentPass != '' && $newPass != '' && $confirmPass != ''){
                            if(password_verify($currentPass,$row['password'])){
                                if($newPass == $confirmPass){
                                    $sql = "UPDATE user SET password = '$securePassword' WHERE userName = '$uName';";
                                    mysqli_query($connect,$sql);
                                    if($row['role'] == 'Student'){
                                        header("Location:studentProfile.php?status=success");
                                        exiit();
                                    } elseif($row['role'] == 'Admin'){
                                        header("Location:adminProfile.php?status=success");
                                        exiit();
                                    } else{
                                        header("Location:lecturerProfile.php?status=success");
                                        exiit();
                                    }
                                } else {
                                    echo 'Password Mismatch';
                                }
                            } else{
                                echo 'Password Incorrect';
                            }
                        } else {
                            echo 'You must fill all the fields';
                        }
                    }
                } else {
                    echo "Data doesn't exist";
                }
                }

            
        } else {
            echo 'Error Occured';
        }
    } else {
        echo 'Error Occured';
    }
        

    
?>