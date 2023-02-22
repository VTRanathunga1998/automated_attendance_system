<?php
    session_start();
    if(empty($_SESSION['userName'])){
        header("Location:index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Password change</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            border: 0;
            padding: 0;
        }
        
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            text-align: center;
        }
        
        a {
            color: white;
            text-decoration: none;
        }
        
        .bg {
            background-image: url("Src/pexels-pixabay-33545.jpg");
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .bg-transp {
            height: 100%;
            width: 100%;
            display: flex;
        }
        
        .left-side {
            height: 100%;
            width: 35%;
            background-color: rgb(47, 3, 88);
            opacity: 0.8;
        }
        
        .right-side {
            height: 100%;
            width: 65%;
            background-color: rgb(214, 213, 213);
            opacity: 0.87;
        }
        
        .upper {
            height: 95%;
        }
        
        .lower {
            height: 5%;
        }
        
        .top-upper {
            height: 25%;
        }
        
        .middle-upper {
            height: 50%;
        }
        
        .bottom-upper {
            height: 25%;
        }
        
        .middle-upper-header {
            height: 10%;
        }
        
        .middle-upper-links {
            height: 90%;
        }
        
        .link0,
        .link1,
        .link2,
        .link3,
        .link4 {
            height: 15%;
            padding-left: 10%;
            padding-top: 5%;
        }
        
        .link1 a,
        .link2 a,
        .link3 a,
        .link4 a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: x-large;
        }
        
        .disabled {
            pointer-events: none;
            cursor: default;
        }
        
        .link1:hover,
        .link3:hover,
        .link4:hover {
            background-color: blueviolet;
        }
        
        .rs-top {
            height: 10%;
            display: flex;
        }
        
        .rs-middle {
            height: 80%;
            position: relative;
        }
        
        .rs-bottom {
            height: 10%;
        }
        
        .logout-btn {
            width: 30%;
            height: 100%;
            position: relative;
            /*According to the .logout btn division , all elements in the division should be arranged*/
        }
        
        .logout-btn button {
            padding: 3%;
            padding-left: 5%;
            padding-right: 5%;
            background-color: red;
            border: none;
            border-radius: 2mm;
            color: white;
            font-size: large;
        }
        
        .btn-container button {
            padding: 2%;
            padding-left: 10%;
            padding-right: 10%;
            background-color: rgb(21, 180, 82);
            border: none;
            border-radius: 10mm;
            color: white;
            font-size: large;
        }
        
        .btn-center,
        .pw-change-container,
        .btn-container button,
        input[type="text"] {
            margin: 0;
            position: absolute;
            /*According to himself ,behaviours are done*/
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        
        .logout-btn button:hover,
        .rsm-bottom button:hover,
        .btn-container button:hover {
            background-color: black;
        }
        
        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        #message{
            position:relative;
            color:black;
            font-size:15px;
            display:none;
        }

        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }
        button:hover{
            opacity: .7;
        }
        .error {
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }

        .success {
        background: #D4EDDA;
        color: #40754C;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .ca {
            font-size: 14px;
            display: inline-block;
            padding: 10px;
            text-decoration: none;
            color: #444;
        }
        .ca:hover {
            text-decoration: underline;
        } 

        .home-nav a {
            padding: 10px;
            color: #f7bd65;
            text-transform: uppercase;
            text-decoration: none;
        }
        
    </style>
</head>

<body>
    <div class="bg">
        <div class="bg-transp">
            <div class="left-side">
                <div class="upper">
                    <div class="top-upper"></div>
                    <div class="middle-upper">
                        <div class="middle-upper-header">
                            <h1 style="color:white;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Student Portal</h1>
                        </div>
                        <div class="middle-upper-links">
                            <div class="link0" style="padding:0"></div>
                            <div class="link1">
                                <a href="studentProfile.php"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a>
                            </div>
                            <div class="link2">
                                <a href="" class="disabled" style="color:rgb(219, 7, 219);"><i class="fa fa-lock" aria-hidden="true"></i>  Change Password</a>
                            </div>
                            <div class="link4">
                                <a href="studentAttendance.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>  Attendance Record</a>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-upper"></div>
                </div>
                <div class="lower">
                    <p style="font-size:smaller;color: white;text-align: center;padding-top: 3%;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-style: italic;font-weight: bold;">&copy; All right reserved.Automated Attendance System</p>
                </div>
            </div>
            <div class="right-side">
                <div class="rs-top">
                    <div style="width: 70%;height: 100%;"></div>
                    <div class="logout-btn">
                        <button type="button" class="btn-center"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Log out</a></button>
                    </div>
                </div>

                    
                

                    <div class="rs-middle">
                        <div class="pw-change-container">
                            <div class="pwc-top"></div>
                            <div class="pwc-middle">

                                <form action="changePass.php" method="post">
                                    <h2>Change Password</h2>
                                    

                                    <label>Old Password</label>
                                    <input type="password" 
                                        name="currentPass" 
                                        placeholder="Old Password" required>
                                        <br>

                                    <label>New Password</label>
                                    <div class="input-box">
                                        <input type="password" name="newPass" id="password" placeholder="New Password" required>
                                        <p id='message'>
                                            Password is <span id='strength'></span>
                                        </p>
                                    </div>    
                                        <br>

                                    <label>Confirm New Password</label>
                                    <input type="password" 
                                        name="confirmPass" 
                                        placeholder="Confirm New Password" required>
                                        <br>

                                    <button type="submit" name="changedPass">CHANGE</button>
                                    <a href="studentProfile.php" class="ca">HOME</a>
                                </form>

                            </div>
                            <div class="pwc-bottom"></div>
                        </div>
                    </div>


                <div class="rs-bottom"></div>
            </div>
        </div>
    </div>

    <script>
        var pass = document.getElementById("password");
        var msg = document.getElementById("message");
        var str = document.getElementById("strength");

        pass.addEventListener('input', () => {
            if(pass.value.length > 0){
                msg.style.display = "block";
            } else {
                msg.style.display = "none"; 
            }

            if(pass.value.length < 4){
                str.innerHTML = "weak";
                pass.style.borderColor = "#ff5925";
                msg.style.color = "#ff5925";
            } else if(pass.value.length >= 4 && pass.value.length < 8) {
                str.innerHTML = "medium";
                pass.style.borderColor = "purple";
                msg.style.color = "purple";
            } else if(pass.value.length >= 8) {
                str.innerHTML = "strong";
                pass.style.borderColor = "green";
                msg.style.color = "green";
            }

            
        });
    </script>


</body>

</html>