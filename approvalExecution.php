<?php

    session_start();
    if(empty($_SESSION['userName']) || $_SESSION['role'] != 'Admin'){
        header("Location:logindenied.php");
    }

    include 'database.php';
    
    $sql = "SELECT * FROM approve";

    $result = mysqli_query($connect,$sql);

    if(mysqli_num_rows($result) == 0){
        header("Location:adminSettingAddMember.php?memberCount=0");
        exit();
    }
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
    <style>
        a{
            text-decoration:none;
            color:white;
        }
    </style>
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
                            <a class="nav-link " aria-current="page" href="adminProfile.php">Home</a>
                            </li>
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
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table table-sm table-success">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Role</th>
                            <th scope="col">Name</th>
                            <th scope="col">NIC</th>
                            <th scope="col">Email</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_assoc($result)){
                        ?>        
                                <tr>
                                    <td scope="col" class="align-middle"><?php echo $row['id'] ?></td>
                                    <td scope="col" class="align-middle"><?php echo $row['role'] ?></td>
                                    <td scope="col" class="align-middle"><?php echo $row['firstName'] ?></td>
                                    <td scope="col" class="align-middle"><?php echo $row['nic'] ?></td>
                                    <td scope="col" class="align-middle"><?php echo $row['email'] ?></td>
                                    <td scope="col" class="align-middle"><?php echo $row['faculty'] ?></td>
                                    <td scope="col" class="align-middle"><?php echo $row['department'] ?></td>
                                    <td scope="col" class="align-middle">
                                        <div class="d-flex gap-2">
                                            <button class='btn btn-success'>
                                                <a id="confirmClickActionElementId" href='giveApprove.php?action=accept&id=<?php echo $row["id"] ?>'>Accept</a>
                                            </button>

                                            <button class='btn btn-danger'>
                                                <a id="confirmClickActionElementId" href='giveApprove.php?action=reject&id=<?php echo $row["id"] ?>'>Delete</a>
                                            </button>
                                        </div>
                                    </td>
                                </tr> 
                        <?php            
                            }
                        ?>                     
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <script>
        document
        .getElementById("confirmClickActionElementId")
        .addEventListener("click", function(  ){ 
            return confirm("Do you really want to do this?") ;
        });
    </script>

</body>

</html>