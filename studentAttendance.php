<?php

    session_start();
    if(empty($_SESSION['userName'])){
        header("Location:logindenied.php");
    }

    include 'database.php';

    if(isset($_SESSION['userName'])){
        $userName = $_SESSION['userName'];
                                                                                 
        $sql = "SELECT subject,activityType,date,timeStart,timeEnd,semester 
                    FROM session 
                    INNER JOIN attendance 
                    ON attendance.sessionID = session.sessionID 
                    WHERE attendance.regNum = '$userName';";

        
                                            
        
    } else {
        echo 'Operation Failed';
    } 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Atendance...</title>
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
        .link2:hover,
        .link3:hover {
            background-color: blueviolet;
        }
        
        .rs-top {
            height: 10%;
            display: flex;
        }
        
        .rs-middle {
            height: 80%;
            position: relative;
            margin-left: 10%;
            margin-right: 10%;
        }
        
        .rs-bottom {
            height: 10%;
        }
        
        .logout-btn,
        .back-btn {
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
        
        .back-btn button {
            width: 50%;
            padding: 3%;
            padding-left: 5%;
            padding-right: 5%;
            background-color: darkmagenta;
            border: none;
            border-radius: 2mm;
            color: white;
            font-size: large;
        }
        
        .btn-center,
        .rsmb-col-btn,
        .rsmt-header h1,
        .rsmt-footer table {
            margin: 0;
            position: absolute;
            /*According to himself ,behaviours are done*/
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        
        .logout-btn button:hover,
        .back-btn button:hover {
            background-color: black;
        }
        
        .rsm-col button:hover {
            opacity: 0.7;
        }
        
        .rsm-top {
            height: 20%;
        }
        
        .rsm-top h1 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        
        .rsm-middle {
            background-color: white;
            height: 60%;
            border-radius: 10mm;
            box-shadow: 0px 0px 7px 3px rgb(46, 46, 46);
            padding: 3%;
        }
        
        .rsm-bottom {
            height: 10%;
            margin-left: 5%;
            display: flex;
        }
        
        .rsm-col {
            width: 50%;
            position: relative;
        }
        
        .rsmb-col-btn {
            border: none;
            background-color: black;
            color: white;
            border-radius: 5mm;
            width: 70%;
            height: 60%;
            font-size: large;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
        }
        
        .rsm-header {
            height: 0%;
        }
        
        .rsmh-row {
            height: 100%;
            position: relative;
        }
        
        .rsm-footer {
            height: 100%;
            position: relative;
        }
        
        .rsmh-left-col {
            width: 40%;
            height: 100%;
            padding-top: 5%;
        }
        
        .rsmh-right-col {
            width: 60%;
            height: 100%;
            padding-top: 5%;
            padding-left: 10%;
        }
        
        .rsmh-right-col input[type="text"] {
            float: left;
            border: 1px solid darkmagenta;
            border-top-left-radius: 2mm;
            border-bottom-left-radius: 2mm;
            width: 70%;
            height: 60%;
            padding: 2%;
            background-color: aliceblue;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        
        .rsmh-right-col button {
            float: left;
            border: 1px solid darkmagenta;
            background-color: darkmagenta;
            height: 60%;
            padding: 2%;
            border-top-right-radius: 2mm;
            border-bottom-right-radius: 2mm;
            color: rgb(94, 94, 94);
        }
        
        .rsmh-right-col button:hover {
            background-color: black;
            border: 1px solid rgb(0, 0, 0);
            color: white;
        }
        
        .rsmh-left-col p {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        
        .rsmh-left-col select {
            border: 1px solid darkmagenta;
            border-radius: 2mm;
        }
        
        .rsmf-table tr:nth-child(even) {
            background-color: rgb(233, 235, 168);
        }
        
        .rsmf-table {
            width: 90%;
            height: 70%;
            border-collapse: collapse;
            margin: 0;
            position: absolute;
            /*According to himself ,behaviours are done*/
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            overflow-y: auto;
        }
        
        .rsmf-table table {
            width: 100%;
        }
        
        .rsmf-table th {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: large;
            height: 30px;
        }
        
        .rsmf-table td {
            padding: 1%;
            color: rgb(63, 63, 63);
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            height: 20px;
        }
        
        .rsmf-table tr:hover {
            background-color: blueviolet;
        }
        
        .rsmf-table td:hover {
            color: white;
        }
        
        .rsmf-table td,
        .rsmf-table tr,
        .rsmf-table th,
        .rsmf-table {
            border: none;
        }
        
        .rsmt-footer {
            height: 50%;
            position: relative;
            width: 100%;
            text-align: center;
        }
        
        .rsmt-footer table {
            width: 50%;
        }
        
        .rsmt-footer th {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: rgb(0, 0, 0);
        }
        
        .rsmt-footer select {
            border: 1px solid darkmagenta;
            background-color: aliceblue;
            width: 100%;
            height: 100%;
            padding-top: 3%;
            padding-bottom: 3%;
            border-radius: 2mm;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 100%;
            color: gray;
        }
        
        .rsmt-footer select option {
            color: black;
        }
        
        .rsmt-header {
            height: 50%;
            position: relative;
        }
        
        .rsmt-header h1 {
            font-size: x-large;
        }
        
        .rsmf-table-sticky_th {
            background-color: rgb(202, 135, 35);
            position: sticky;
            top: 0;
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
                                <a href="studentPassChange.php"><i class="fa fa-lock" aria-hidden="true"></i>  Change Password</a>
                            </div>

                            <div class="link4">
                                <a href="" style="color:rgb(219, 7, 219);" class="disabled"><i class="fa fa-pie-chart" aria-hidden="true"></i>  Attendance Record</a>
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
                    <div class="back-btn">
                        <button type="button" class="btn-center"><a href="studentProfile.php">Back</a></button>
                    </div>
                    <div style="width: 40%;height: 100%;"></div>
                    <div class="logout-btn">
                        <button type="button" class="btn-center"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Log out</a></button>
                    </div>
                </div>
                <div class="rs-middle">
                    <div class="rsm-top">
                        <div class="rsmt-header">
                            <h1>Attendance Summary : Present</h1>
                        </div>
                        <div class="rsmt-footer">
                            
                        </div>
                    </div>
                    <div class="rsm-middle">
                        <div class="rsm-header">
                            <div class="rsmh-row" style="display: flex;">
                                
                                
                            </div>
                        </div>
                        <div class="rsm-footer">
                            <div class="rsmf-table">
                                <table>
                                    <thead>
                                        <tr class="rsmf-table-sticky_th">
                                            <th>Subject Name</th>
                                            <th>Activity</th>
                                            <th>Date</th>
                                            <th>Time Slot</th>
                                            <th>Semester</th>
                                            
                                        </tr>
                                    </thead>
     
                                    <tbody>
                                        <?php  
                                                                                        
                                            if(mysqli_query($connect,$sql)){
                                                $result = mysqli_query($connect,$sql);
                                                $resultRows = mysqli_num_rows($result);
                                                                                                
                                                if($resultRows > 0){
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {                                                                                                                 
                                                        echo "<tr><th>".$row['subject']."</th><th>".$row['activityType']."</th><th>".$row['date']."</th><th>".$row['timeStart'].' to '.$row['timeEnd']."</th><th>".$row['semester']."</th></tr>" ;
                
                                                    }
                                                                                                                    
                                                    
                                                }

                                                else {

                                                    echo 'Error';
                                                    
                                                }
                                                                                                    
                                                
                                            } else {

                                                die('Invalid query: ' . mysql_error());
                                                
                                            }

                                        ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="rsm-bottom">
                        <div class="rsm-col">
                            <button type="button" class="rsmb-col-btn" style="background-color: red;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</button>
                        </div>
                        <div class="rsm-col">
                            <button type="button" class="rsmb-col-btn" style="background-color: rgb(5, 165, 5);"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download .xls</button>
                        </div>
                    </div>
                </div>
                <div class="rs-bottom"></div>
            </div>
        </div>
    </div>
</body>

</html>