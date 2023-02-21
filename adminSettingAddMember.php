<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add member</title>
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
        .btn-container button
         {
            margin: 0;
            position: absolute;
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
            border-radius: 15px;
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

        input[type=text] {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        input[type=file] {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
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
                                <a href="adminProfile.php" class="disabled"><i class="fa fa-user" aria-hidden="true"></i>  Profile</a>
                            </div>
                            <div class="link2">
                                <a href="adminPassChange.php" class="disabled"><i class="fa fa-lock" aria-hidden="true"></i>  Change Password</a>
                            </div>
                            <div class="link3">
                                <a href="adminTakeAttendance.php"  class="disabled"><i class="fa fa-qrcode" aria-hidden="true"></i>  Take Attendance</a>
                            </div>
                            <div class="link4">
                                <a href="#"  class="disabled"><i class="fa fa-pie-chart" aria-hidden="true"></i>  Attendance Record</a>
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
                            <div class="pwc-top"></div>
                            <div class="pwc-middle">

                                <form action="addMemberGen.php" method="POST">
                                    <h2>Add Members</h2>
                                    

                                    <label>Pick up a role</label>
                                    <div>             
                                        <select name="chooseRole" id="role" class="form-select mb-2">
                                            <option value="Admin">Admin</option>
                                            <option value="Student">Student</option>
                                            <option value="Lecturer">Lecturer</option>
                                        </select>
                                    </div>
                                       
                                        <br>

                                    <label>ID</label>
                                    <div>             
                                        <input type="text" name = "id" placeholder="Enter Register Number / Lecturer ID / Admin ID" required>
                                    </div>
                                       
                                        <br>

                                    <label>First Name</label>
                                    <div>             
                                        <input type="text" name ="fName" placeholder="Enter first name" required>
                                    </div>
                                       
                                        <br>
                                    
                                    
                                    <label>Last Name</label>
                                    <div>             
                                        <input type="text" name = "lName" placeholder="Enter last name" required>
                                    </div>
                                       
                                        <br>
                                    
                                    <label>NIC</label>
                                    <div>             
                                        <input type="text" name = "nic" placeholder="Enter nic" required>
                                    </div>
                                       
                                        <br>

                                    <label>Mobile Number</label>
                                    <div>             
                                        <input type="text" name = "mobNum" placeholder="Enter mobile number" required>
                                    </div>
                                       
                                        <br>
                                        
                                    <label>E-mail</label>
                                    <div>             
                                        <input type="text" name = "email" placeholder="Enter email" required>
                                    </div>
                                       
                                        <br>
                                    
                                    <label>Faculty</label>
                                    <div>             
                                        <select name="chooseFac" id="faculty" class="form-select mb-2" required></select>
                                    </div>
                                       
                                        <br>

                                    <label>Department</label>
                                    <div>             
                                        <select name="chooseDep" id="department" class="form-control" required></select>
                                    </div>
                                       
                                        <br>


                                    <label>Gender</label>
                                    <div>             
                                        <select name="chooseGender" id="" class="form-select mb-2" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                       
                                        <br>

                                    <div id="batch_div">
                                        <label>Batch</label>
                                        <div>             
                                            <select name="chooseBatch" id="" class="form-select mb-2" required>
                                                <option value="15/16">15/16</option>
                                                <option value="16/17">16/17</option>
                                                <option value="17/18">17/18</option>
                                                <option value="18/19">18/19</option>
                                                <option value="20/21">20/21</option>
                                            </select>
                                        </div>
                                    </div>
                                       
                                        <br>    

                                    <label>Profile Picture</label>
                                    <div>             
                                        <input type="file" name = "profilePic">
                                    </div>
                                       
                                        <br>    


                                    <button type="submit" name="addMember">Add</button>
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

    <script>

        var role = document.getElementById("role");
        var batch = document.getElementById("batch_div");

        batch_div.style.display = "none";

        function hideBatch(){
            batch_div.style.display = "none";
        }

        function unhideBatch(){
            batch_div.style.display = "block";
        }
        
        $(document).ready(function () {
        debugger;


            $("#role").change(function () {
                debugger;

                if(role.value=="Admin" || role.value=="Lecturer"){ 
                    hideBatch();
                } else {
                    unhideBatch();
                }

            });  
            

        });
    </script>    

    <script src="js_multi_level_dropdown.js"></script>

</body>

</html>