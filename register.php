<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($page_title)) { echo $page_title; }?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body>

  <div class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="#">Attendance System</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Home</a>
                            </li>

                            <?php if(!isset($_SESSION['userName'])) : ?>
                                  <li class="nav-item">
                                  <a class="nav-link active" href="register.php">Register</a>
                                  </li>
                                  <li class="nav-item">
                                  <a class="nav-link" href="login.php">Login</a>
                                  </li>
                            <?php endif ?>

                            <?php if(isset($_SESSION['userName'])) : ?>
                                <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log out</a>
                                </li>
                            <?php endif ?>

                        </ul>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>  
    <main class="container py-5">
        <div class="p-5 ">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow overflow-auto" >  <!--style="height: 500px;"-->
                        <div class="card-header">
                            <h5>Register Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="approval.php" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label>Pick up a role</label>
                                    <select class="form-select" name="chooseRole" id="role" aria-label="Default select example">
                                        <option value="Student" >Student</option>
                                        <option value="Lecturer" selected>Lecturer</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="text" class="form-control" name = "id" placeholder="Enter Register Number / Lecturer ID / Admin ID" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">First name</label>
                                    <input type="text" class="form-control" name ="fName" placeholder="Enter first name" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Last name</label>
                                    <input type="text" class="form-control" name ="lName" placeholder="Enter last name" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">NIC</label>
                                    <input type="text" class="form-control" name = "nic" placeholder="Enter nic" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mobile number</label>
                                    <input type="text" class="form-control" name = "mobNum" placeholder="Enter mobile number" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name = "email" placeholder="Enter email" aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>

                                <div class="mb-3">
                                    <label>Faculty</label>
                                    <select class="form-select" name="chooseFac" id="faculty" required></select>
                                </div>

                                <div class="mb-3">
                                    <label>Department</label>
                                    <select class="form-select" name="chooseDep" id="department" required></select>
                                </div>

                                <div class="mb-3">
                                    <label>Gender</label>
                                    <select class="form-select" name="chooseGender" id="department" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="batch_div">
                                    <label>Batch</label>
                                    <select class="form-select" name="chooseBatch" id="department" required>
                                        <option value="15/16">15/16</option>
                                        <option value="16/17">16/17</option>
                                        <option value="17/18">17/18</option>
                                        <option value="18/19">18/19</option>
                                        <option value="20/21">20/21</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Profile picture</label>
                                    <input class="form-control" type="file" name = "profilePic" id="profilePic">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name = "password" placeholder="Enter password" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm password</label>
                                    <input type="password" class="form-control" name = "confirmPassword" placeholder="Re - enter password" required>
                                </div>

                                <button type="submit" class="btn btn-primary" name="register">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- <div class="right-side">

            <div class="rs-middle">
                <div class="create-session-container">
                    <div class="pwc-top"></div>
                    <div class="pwc-middle">

                        <form action="addMemberGen.php" method="POST" enctype="multipart/form-data">
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
                                <input type="file" name = "profilePic" id="profilePic">
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
    </div> -->

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