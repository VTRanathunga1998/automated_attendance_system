<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take attendance - create session</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        .link4,
        .link5 {
            height: 15%;
            padding-left: 10%;
            padding-top: 5%;
        }

        .link5 i{
            position: relative;
            color: #fff;

        }
        
        .link1 a,
        .link2 a,
        .link3 a,
        .link4 a,
        .link5 a {
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
        .link2:hover,
        .link4:hover,
        .link5:hover {
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
        .create-session-container,
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
            height: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: none;
            overflow:hidden;
            overflow-y:scroll;

        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        form select {
            display: block;
            border: 2px solid #ccc;
            width: 100%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        form .time-slot{
            display:inline;
            border: 2px solid #ccc;
            width: auto;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
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
                            <h1 style="color:white;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Admin Portal</h1>
                        </div>
                        <div class="middle-upper-links">
                            <div class="link0" style="padding:0"></div>
                            <div class="link1">
                                <a href="adminProfile.php"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a>
                            </div>
                            <div class="link2">
                                <a href="adminPassChange.php" ><i class="fa fa-lock" aria-hidden="true"></i>  Change Password</a>
                            </div>
                            <div class="link3">
                                <a href="" class="disabled" style="color:rgb(219, 7, 219);"><i class="fa fa-qrcode" aria-hidden="true"></i>  Take Attendance</a>
                            </div>
                            <div class="link4">
                                <a href="adminAttendanceRecord.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>  Attendance Record</a>
                            </div>
                            <div class="link5">
                                <a href="adminSettingHome.php"><i class="fa fa-gear" aria-hidden="true"></i>  Setting </a>
                                <i class="fa fa-caret-down"></i>
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
                        <button type="button" class="btn-center"><a href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Log out</a></button>
                    </div>
                </div>

                    
                

                    <div class="rs-middle">
                        <div class="create-session-container">
                            <div class="pwc-top"></div>
                            <div class="pwc-middle">

                                <form action="createAttendanceSession.php" method="post">
                                    <h2>Create Session</h2>
                                    

                                    <div id="faculty_div">
                                        <label>Faculty</label>
                                        <div class="frm-select" >             
                                            <select id="faculty" class="form-control" name="chooseFac" required>
                                                
                                            </select>
                                        </div>
                                        
                                            <br>
                                    </div>

                                    <div id="department_div">
                                        <label>Department</label>
                                        <div class="frm-select" >              
                                            <select id="department" class="form-control" name="chooseDep"required>
                                                
                                            </select>
                                        </div>
                                        
                                            <br>
                                    </div>
 
                                    <div id="semester_div">
                                        <label>Semester</label>
                                        <div class="frm-select" >             
                                            <select name="chooseSem" id="semester" class="form-select mb-2" required>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                                <option value="VII">VII</option>
                                                <option value="VIII">VIII</option>
                                            </select>
                                        </div>
                                            
                                            <br>
                                    </div>

                                    <div id="subject_div">
                                        <label >Subject</label>
                                        <div class="frm-select" >             
                                            <select id="subject" class="form-control" name="chooseSub" required>
                                                
                                            </select>
                                        </div> 
                                            
                                            <br>
                                    </div>

                                    <label>Activity Type</label>
                                    <div class="frm-select">             
                                        <select name="chooseActType" id="" class="form-select mb-2" required>
                                            <option value="Theory">Theory</option>
                                            <option value="Lab">Lab</option>
                                        </select>
                                    </div>
                                        
                                        <br>    

                                    

                                    <label>Batch</label>
                                    <div class="frm-select">             
                                        <select name="chooseBatch" id="" class="form-select mb-2" required>
                                            <option value="16/17">16/17</option>
                                            <option value="17/18">17/18</option>
                                            <option value="18/19">18/19</option>
                                            <option value="19/20">19/20</option>
                                        </select>
                                    </div>
                                        
                                        <br>

                                    <label>Time Slot</label>
                                    <div class="frm-select ">             
                                        <select name="timeStartHH" id="" class="form-select mb-2 time-slot" required>
                                            <option value="06" selected>06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            
                                        </select>
                                                 
                                        <select name="timeStartMM" id="" class="form-select mb-2 time-slot" required>
                                            <option value="00">00</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>

                                        </select>

                                        to

                                        <select name="timeEndHH" id="" class="form-select mb-2 time-slot" required>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08" selected>08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            
                                        </select>
                                                 
                                        <select name="timeEndMM" id="" class="form-select mb-2 time-slot" required>
                                            <option value="00">00</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>

                                        </select>

                                        
                                    </div> 

                                    <br>
                                    
                                        
                                            

                                    <button type="submit" name="newSession">Create</button>
                                    <a href="adminProfile.php" class="ca">HOME</a>
                                </form>

                            </div>
                            <div class="pwc-bottom"></div>
                        </div>
                    </div>


                <div class="rs-bottom"></div>
            </div>
        </div>
    </div>

    <script src="js_multi_level_dropdown.js"></script>

</body>

</html>