<?php

    session_start();

    include 'database.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function send_password_reset($userName,$token,$email){
        $mail = new PHPMailer(true);
        $mail->isSMTP(); 
        $mail->SMTPAuth   = true; 
        $mail->Host = 'smtp.gmail.com';                                                 
        $mail->Username = 'samplemailsent@gmail.com';                   
        $mail->Password = 'zbaeebgpcuxxvuqv';   
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
        $mail->Port = 465; 
        $mail->setFrom('samplemailsent@gmail.com', $userName);
        $mail->addReplyTo('samplemailsent@gmail.com', $userName);
        $mail->addAddress($email);
        $mail->isHTML(true);                                  
        $mail->Subject = 'Email verification from Student Attendance System';
        $email_template = "
        <h2 style='text-align:center;'>Hi $userName, </h2>
        <h3 style='text-align:center;'>We're sending you this mail because you requested a password reset. Click on this link to create a new password</h3>
        <br />

        <div>
            <button 
                style='text-align:center; 
                background-color: #f44336;
                text-align: center;
                border:none;
                text-decoration: none;
                display: inline-block; 
                border-radius: 12px; 
                padding: 15px 32px; 
                font-size: 16px; 
                margin:0 auto;
                display:block;'
            >
            <a style='text-decoration:none; color:white;' href='http://localhost/attendanceSystem/resetpassword.php?token=$token&email=$email'>
            
            Click Me
            
            </a>
            </button>
        </div>
        <br>
        <h3 style='text-align:center;'>If you didn't request a password reset, you can ignore this email. Your password will not be changed.</h3><br>
        <h5 style='text-align:center;'>-Admin-</h5>";

        $mail->Body    = $email_template;
        $mail->send();

    }

    if(isset($_POST['password_reset_link'])){
        $userName= mysqli_real_escape_string($connect,$_POST['userName']);
        $token = md5(rand());

        $check_username = "SELECT * FROM user WHERE userName = '$userName' LIMIT 1";
        $check_username_run = mysqli_query($connect,$check_username);

        

        if(mysqli_num_rows($check_username_run) > 0) {
            $row = mysqli_fetch_array($check_username_run);
            $userName = $row['userName'];
            $role = strtolower($row['role']);
            $find_email = "SELECT email FROM $role WHERE userName = '$userName'";
            $find_email_run = mysqli_query($connect,$find_email);
            
            $email = mysqli_fetch_array($find_email_run)['email'];

            $update_token = "UPDATE user SET verify_token = '$token' WHERE userName = '$userName' LIMIT 1";
            $update_token_run = mysqli_query($connect,$update_token);

            if($update_token_run){
                send_password_reset($userName,$token,$email);
                $_SESSION['status'] = "We emailed you a password reset link";
                $_SESSION['state'] = "success";
                header("Location:forgotpassword.php");
                exit();
            } else {
                $_SESSION['status'] = "Something went wrong!";
                $_SESSION['state'] = "danger";
                header("Location:forgotpassword.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Username not found";
            $_SESSION['state'] = "danger";
            header("Location:forgotpassword.php");
            exit();
        }
    }


    if(isset($_POST['password_update'])){
        $new_password = mysqli_real_escape_string($connect,$_POST['pwd']);
        $new_confirm_password = mysqli_real_escape_string($connect,$_POST['confirmpwd']);
        $token = mysqli_real_escape_string($connect,$_POST['pwd_token']);

        if(!empty($token)){
            if(!empty($token) && !empty($new_password) && !empty($new_confirm_password)){
                $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
                $check_token_run = mysqli_query($connect,$check_token);

                if(mysqli_num_rows($check_token_run) > 0){
                    if($new_password == $new_confirm_password){

                        // Validate password strength
                        $uppercase    = preg_match('@[A-Z]@', $new_password);
                        $lowercase    = preg_match('@[a-z]@', $new_password);
                        $number       = preg_match('@[0-9]@', $new_password);
                        $specialchars = preg_match('@[^\w]@', $new_password);

                        if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($new_password) < 8){
                            $_SESSION['status'] = "Password is too weak. At least 8-12 characters long but 14 or more is better. A combination of uppercase letters, lowercase letters, numbers, and symbols";
                            $_SESSION['state'] = "danger";
                            header("Location:resetPassword.php");
                            exiit();
                        } else {
                            $hashed_new_password = password_hash($new_password,PASSWORD_DEFAULT);
                            $update_password = "UPDATE user SET password = '$hashed_new_password' WHERE verify_token = '$token' LIMIT 1";
                            $update_password_run = mysqli_query($connect,$update_password);

                            if($update_password_run){
                                $new_token = md5(rand());
                                $update_to_new_token = "UPDATE user SET verify_token = '$new_token' WHERE verify_token = '$token' LIMIT 1";
                                $update_to_new_token_run = mysqli_query($connect,$update_to_new_token);

                                $_SESSION['status'] = "Password changed succesfully.";
                                $_SESSION['state'] = "success";
                                header("Location:login.php");
                                exit();
                            } else {
                                $_SESSION['status'] = "Did not change password. Something went wrong.";
                                $_SESSION['state'] = "danger";
                                header("Location:resetPassword.php");
                                exit();
                            }

                        }
                    } else {
                        $_SESSION['status'] = "Password and confirm password does not match.";
                        $_SESSION['state'] = "danger";
                        header("Location:resetPassword.php");
                        exit();
                    }
                } else {
                    $_SESSION['status'] = "Invalid token";
                    $_SESSION['state'] = "danger";
                    header("Location:resetPassword.php");
                    exit();
                }

            } else {
                $_SESSION['status'] = "All fields are mandatory";
                $_SESSION['state'] = "danger";
                header("Location:resetPassword.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "No token available";
            $_SESSION['state'] = "danger";
            header("Location:resetPassword.php");
            exit();
        }
    }
?>








