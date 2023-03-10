<?php 
  session_start();
  if(isset($_SESSION['userName'])){
    if($_SESSION['userName'] == 'Admin'){
        header("Location:adminProfile.php");
    } elseif ($_SESSION['userName'] == 'Student'){
        header("Location:studentProfile.php");
    } elseif($_SESSION['userName'] == 'Lecturer'){
        header("Location:lecturerProfile.php");
    }
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
</head>
<body>

  <div class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Attendance System</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>

                            <?php if(!isset($_SESSION['userName'])) : ?>
                                  <li class="nav-item">
                                  <a class="nav-link" href="register.php">Register</a>
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

    <!-- <div class="container-fluid" style="padding:0;">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="styles/img/c_one.jpg"  style="object-fit: cover; " class="d-block w-100"  height="400px" alt="image">
            </div>
            <div class="carousel-item">
            <img src="styles/img/c_two.jpg" style="object-fit: cover; " class="d-block w-100"  height="400px" alt="image">
            </div>
            <div class="carousel-item">
            <img src="styles/img/book-2363912_1280.jpg" style="object-fit: cover; " class="d-block w-100"  height="400px" alt="image">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div> -->
    <div class="py-5">
        <div class="container">
            <div class="row flex-grow-1 justify-content-center">
                <div class="col-md-12 text-center ">
                    
                    

                    <div class="clearfix">
                        <img src="styles/img/SUSL_logo2.png" class="rounded mx-auto d-block img-fluid" alt="SUSL">
                    </div>
                    <h2>Automated Attendance System</h2>
                    <h5>Sabaragamuwa University Of Sri Lanka</h5>
                </div>
            </div>
        </div>
    </div>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>