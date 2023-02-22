<?php

    session_start();
    if(empty($_SESSION['userName'])){
        header("Location:index.php");
    }

    include 'database.php';
    
    if(isset($_GET['search'])){
        $search = mysqli_real_escape_string($connect,$_GET['search']) ;
        $sql = "SELECT * FROM user WHERE userName LIKE '%{$search}%';";
    } else {
        $sql = "SELECT * FROM user";
    }

    $result = mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Members</title>
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
        
        .link1:hover,
        .link2:hover,
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
        .create-session-container,
        .btn-container button {
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
        
        .pwc-top h1{
            color:black;
        }

        .pwc-middle {
            width: 900px;
            height: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            /* border-radius: 15px; */
            overflow:hidden;
            /* overflow-y:scroll; */

        }

        .pwc-middle-top{
            display:inline;
        }

        .content {
            position: relative;
            margin-bottom: 2vh;

        }

        .content .cards{
            /* padding: 10px 5px; */
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap:wrap;
        }

        .content .cards .card{
            width: auto;
            padding: 10px;
            background:white;
            margin: auto;
            display:flex;
            align-items:center;
            /* justify-content:space-around; */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }

        .search-result{
            height:400px;
            overflow-y:scroll;
        }

        table{
            border-collaps: collaps;
            width:100%;
            color:#588c7e;
            font-family:monospace;
            font-size: 25px;
            text-align: left;
        }

        thead tr{
            background-color: #d96459;
            color:white;
            align:center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            background: red;
            padding: 5px 10px;
            color: #fff;
            border-radius: 5px;
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
                                <a href="adminTakeAttendance.php"  ><i class="fa fa-qrcode" aria-hidden="true"></i>  Take Attendance</a>
                            </div>
                            <div class="link4">
                                <a href="adminAttendanceRecord.php" ><i class="fa fa-pie-chart" aria-hidden="true"></i>  Attendance Record</a>
                            </div>
                            <div class="link5">
                                <a href="#" style="color:rgb(219, 7, 219);" class="disabled"><i class="fa fa-gear" aria-hidden="true"></i>  Setting</a>
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
                        <button type="button" class="btn-center"><a href="adminSettingHome.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  End</a></button>
                    </div>
                </div>

                <div class="rs-middle">
                    <div class="create-session-container">
                        <div class="pwc-top" >
                            <h2>Remove Members</h2>
                        </div>
                        <div class="pwc-middle">

                            <div class="content">
                                <div class="cards">
                                    <div class="card">
                                        <div class="box">
                                            <div class="heading">
                                                <h4>Search</h4>
                                                <hr>
                                            </div>      
                                            <div class="content">
                                                <form action="adminSettingRemoveMembers.php" >
                                                    <input type="text" name="search" placeholder="Search here.." autofocus required>
                                                </form>
                                            </div>
                                            <div class="content">
                                                <form action="adminSettingRemoveMembers.php" >
                                                    <a style="color:black;" href="adminSettingRemoveMembers.php">Refresh</a>
                                                </form>
                                            </div>

                                        </div>

                                        
                                    </div>

                                </div>
                            </div>

                            <div class="search-result">
                                <table id="table-data">
                                    <thead>
                                        <tr>
                                            <th align="center">Id</th>
                                            <th align="center">Role</th>
                                            <th align="center">Manage</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            while($row=$result->fetch_assoc()){
                                            ?>    
                                                <tr>
                                                    <td align="center"><?php echo $row['userName'] ?></td>
                                                    <td align="center"><?php echo $row['role'] ?></td>
                                                    <td align="center"><button>
                                                        <a href="removeUser.php?userName=<?php echo $row['userName'] ?>" 
                                                        onclick="return confirm('Are you sure?');"
                                                    >Remove</a></button></td>
                                                </tr>
                                            
                                            <?php    
                                            }
                                            ?>
                                    </tbody>
                                </table>                                        
                            </div>
                        </div>
                        <div class="pwc-bottom"></div>
                    </div>
                </div>   

                <div class="rs-bottom"></div>
            </div>
        </div>
    </div>

</body>

</html>

