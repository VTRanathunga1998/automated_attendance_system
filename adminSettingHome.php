<?php
    session_start();
    if(empty($_SESSION['userName'])){
        header("Location:logindenied.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
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
            height: 30%;
            display: flex;
        }
        
        .rs-middle {
            height: 70%;
            position: relative;
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

        .grid {
            margin: 10px;
            display: grid;
            grid-gap: 1%;
            grid-template-columns: 1fr 1fr 1fr;
            justify-items: start;
            align-items: center;
        }

        .grid-item {
            background-color: #fff;
            border-radius: 0.4rem;
            overflow: hidden;
            box-shadow: 0 3rem 6rem rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: 0.2s;
        }

        .grid-item:hover {
            transform: translateY(-0.5%);
            box-shadow: 0 4rem 8rem rgba(0, 0, 0, 0.5);
        }


        .card-content {
            padding: 3rem;
        }

        .card-header {
            font-size: 3rem;
            font-weight: 500;
            color: #0d0d0d;
            margin-bottom: 1.5rem;
        }

        .card-text {
            font-size: 1.6rem;
            letter-spacing: 0.1rem;
            line-height: 1.7;
            color: #3d3d3d;
            margin-bottom: 2.5rem;
        }

        .card-btn {
            display: block;
            width: 100%;
            padding: 1.5rem;
            margin-bottom: 2px;
            font-size: 1rem;
            color: #3363ff;
            background-color: #d8e0fd;
            border: none;
            border-radius: 0.4rem;
            transition: 0.2s;
            cursor: pointer;
            letter-spacing: 0.1rem;
        }

        .card-btn span {
            margin-left: 1rem;
            transition: 0.2s;
        }

        .card-img {
            display: block;
            width: 10%;
            height: auto;
            object-fit: cover;
        }

        .card-btn a {
            color:blue;
        }

        .card-btn:hover,
        .card-btn:active {
            background-color: #c2cffc;
        }

        .card-btn:hover span,
        .card-btn:active span {
            margin-left: 1.5rem;
        }
        
        .pwc-top h1{
            color:black;
        }


        .pwc-middle-top{
            display:inline;
        }

        .content {
            position: relative;
            margin-bottom: 2vh;

        }

        .content .cards{
            padding: 10px 5px;
            display: block;
            align-items: center;
            /* justify-content: space-between; */
            flex-wrap:wrap;
            margin: 20px;
        }

        .content .cards .card{
            width: 200px;
            height: 50px;
            padding: 10px;
            background:white;
            margin: 30px;
            display:block;
            align-Items: 'center';
            justify-Content: 'center';
            border-radius:10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
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
        

       .btn-set{
            float: none;
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
                                <a href="adminAttendanceRecord.php"  ><i class="fa fa-pie-chart" aria-hidden="true"></i>  Attendance Record</a>
                            </div>
                            <div class="link5">
                                <a href="#" class="disabled" style="color:rgb(219, 7, 219);"><i class="fa fa-gear" aria-hidden="true"></i>  Setting</a>
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
                        <button type="button" class="btn-center"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></button>
                    </div>
                </div>

                <div class="rs-middle">
                    <div class="grid">
                        <div class="grid-item">
                            <div class="card">
                            
                            <div class="card-content">

                                <h1 class="card-header">Add Members</h1>

                                <button class="card-btn"><a href="adminSettingAddMember.php">Go</a> <span>&rarr;</span></button>
                            </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="card">

                            <div class="card-content">

                                <h1 class="card-header">Remove Members</h1>

                                <button class="card-btn"><a href="adminSettingRemoveMembers.php">Go</a> <span>&rarr;</span></button>
                            </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="card">
                            <div class="card-content">

                                <h1 class="card-header">Update Attendance</h1>

                                <button class="card-btn"><a href="adminSettingUpdateAttendance.php">Go</a> <span>&rarr;</span></button>
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

