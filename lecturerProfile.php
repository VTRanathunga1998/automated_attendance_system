<?php

    session_start();
    if(empty($_SESSION['userName'])|| $_SESSION['userName'] != 'Lecturer'){
        header("Location:logindenied.php");
    }

    include_once 'database.php';

    if(isset($_SESSION['userName'])){
        $userName = $_SESSION['userName'];
                                                                                 
        $sql = "SELECT * FROM lecturer WHERE lecturerID = '$userName';";
                                            
        $result = mysqli_query($connect,$sql); 
        
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
    <title>Staff - Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            opacity: 0.95;
            position: relative;
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
        
        .link2:hover,
        .link3:hover,
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
        
        .pp,
        .pp-border,
        .btn-center,
        .close,
        .cont-b-btn,
        .cont-top h1,
        .cont-middle input[type="text"],
        .cont-m-col-radio {
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
        .cont-b-btn:hover {
            background-color: black;
        }
        
        .rsm-top {
            height: 35%;
            position: relative;
        }
        
        .rsm-middle {
            height: 55%;
            position: relative;
            padding: 1%;
        }

        .profile-pic-container{
            width: 100%;
            height: 100%;
            background-size:cover;
            background-position:center;
            display:flex;
            align-items:center;
            justify-content: center;
            /* overflow:hidden; */
        }

        .profile-box{
            background: white;
            text-align:center;
            padding: 40px 90px;
            color: #fff;
            position: relative;
            border-radius:20px;
        }
        
        .profile-pic{
            width: 150px;
            height:150px;
            border-radius:50%;
            background:#fff;
            padding: 6px;
            margin-top: 10px;
            display:cover;
        }

        table{
            border-collaps: collaps;
            width:100%;
            color:#588c7e;
            font-family:monospace;
            font-size: 20px;
            text-align: center;
        }

        table tr{
            background-color: #d96459;
            color:white;
        }



        table tr td{
            padding: 10px;
        }


        tr:first-child{
            background-color: white;
        }


        tr:nth-child(even) {
            background-color: black;
        }

        .rsm-bottom {
            height: 10%;
            position: relative;
        }
        
        .rsm-bottom button,
        .cont-b-btn {
            padding: 1%;
            padding-left: 7%;
            padding-right: 7%;
            background-color: rgb(63, 3, 63);
            border: none;
            border-radius: 2mm;
            color: white;
            font-size: large;
        }
        
        
        
        .td p {
            text-align: left;
        }
        
        .t-col1 {
            width: 25%;
        }
        
        .t-col2 {
            width: 75%;
        }
        
        .t-col1 p {
            color: rgb(53, 53, 53);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        
        .t-col2 p {
            color: black;
            font-weight: bold;
            font-family: 'Courier New', Courier, monospace;
        }
        
        .rsm-pp {
            height: 80%;
            display: flex;
        }
        
        .rsm-pp-name {
            height: 20%;
        }
        
        .pp-container {
            height: 100%;
            width: 40%;
            position: relative;
        }
        
        .pp-border {
            width: 204px;
            height: 204px;
            background-color: grey;
            border-radius: 50%;
            box-shadow: 0px 0px 7px 3px rgb(46, 46, 46);
            position: relative;
        }
        
        .pp {
            border: 2px dashed rgb(75, 2, 75);
        }
        
        
        
        .cont-top {
            height: 10%;
            position: relative;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        
        .cont-middle {
            height: 75%;
            position: relative;
        }
        
        .cont-bottom {
            height: 15%;
            position: relative;
        }
        
        .cont-b-btn {
            border-radius: 10mm;
            padding-left: 13%;
            padding-right: 13%;
            padding-bottom: 3%;
            padding-top: 3%;
        }
        
        .cont-m-row {
            height: 20%;
            padding: 0;
            margin: 0;
            position: relative;
        }
        
        .cont-m-col {
            height: 100%;
            width: 25%;
        }
        
        .cont-middle input[type="text"] {
            width: 90%;
            height: 50%;
            border: none;
            border-radius: 10mm;
            padding-left: 3%;
            padding-right: 3%;
            background-color: white;
            font-size: large;
        }
        
        .cont-m-col-radio {
            font-size: large;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
                            <h1 style="color:white;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Lecturer Portal</h1>
                        </div>
                        <div class="middle-upper-links">
                            <div class="link0" style="padding:0"></div>
                            <div class="link1">
                                <a href="" style="color:rgb(219, 7, 219);" class="disabled"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a>
                            </div>
                            <div class="link2">
                                <a href="lecturerPassChange.php"><i class="fa fa-lock" aria-hidden="true"></i>  Change Password</a>
                            </div>

                            <div class="link4">
                                <a href="lecturerAttendanceRecord.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>  Attendance Record</a>
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
                    <div class="profile-pic-container">
                        <div class="profile-box">
                            
                            <div class="table-content">
                                
                                <table>
                                    <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                    ?> 
                                    
                                    <tr>
                                        
                                        <td colspan="2" class="t-col2">
                                            
                                            <div class="td">
                                                <label><?php echo '<img class="profile-pic" src="data:image/jpeg;base64,'.base64_encode( $row['profilePic'] ).'"/>'; ?></label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        
                                        <td class="t-col1">
                                            <div class="td">
                                                <label>Lecturer ID</label>
                                            </div>
                                        </td>
                                        <td class="t-col2">
                                            
                                            <div class="td">
                                                <label><?php echo $row['lecturerID']; ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                        

                                    <tr>
                                        <td class="t-col1">
                                            <div class="td">
                                                <label>Name</label>
                                            </div>
                                        </td>
                                        <td class="t-col2">
                                            <div class="td">
                                                <label><?php echo $row['firstName'].' '.$row['lastName']; ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td class="t-col1">
                                            <div class="td">
                                                <label>Gender</label>
                                            </div>
                                        </td>
                                        <td class="t-col2">
                                            <div class="td">
                                                <label><?php echo $row['gender']; ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t-col1">
                                            <div class="td">
                                                <label>Email</label>
                                            </div>
                                        </td>
                                        <td class="t-col2">
                                            <div class="td">
                                                <label><?php echo $row['email']; ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <?php
                                    }
                                ?>
                            </div>

                        </div>

                    </div>
                </div>
                        
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>