<?php
    session_start();

    //Token like system
    if(!isset($_SESSION['loginid'])){
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="./stylesheets/index.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script>
            window.onscroll = function() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myNav").style.background = "linear-gradient(rgba(20,20,20, .6), rgba(20,20,20, .5))";
                    document.getElementById("myNav").style.transition = "background 2s ease 0s";
                } else {
                    document.getElementById("myNav").style.background = "transparent";
                }
            };
        </script>
        <title>Lecturers Management System - LMS</title>
    </head>
    <body>
        <div class="aloha">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="myNav">
                <div class="container custom-nav">
                    <a href="index.php" class="navbar-brand">Lecturers Management System</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
                        <ul class="navbar-nav ml-auto">
                            <!-- when admin login -->
                            <?php if($_SESSION['level'] == 1):?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="randomword.php">Learning</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="listing.php">Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="addnew.php">Add new</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            <!-- when user login -->
                            <?php else: ?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="randomword.php">Learning</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    <div class="container-fluid custom-title">
      <div class="container">
        <h1>Homepage</h1>
      </div>
    </div>

    <div class="container"> <!--or container-fluid-->
        <div class="row text-center transition-from-header">
            <div class="col-md-8 cliente left-title"> 
                <div class="container-fluid post-preview left-button">
                    <h1>Introduction</h1>
                    <p>
                        <!-- This is the introduction page </br>
                        Blah blah blah </br>
                        Please giff me HD this course <img src="https://cdn.discordapp.com/emojis/417925609948315658.png?v=1" style="width: 25px; height: auto;">
                            Student name: Mai Pham Quang Huy -->
                        Student ID: s3618861 </br>
                        <a href="https://s3618861-amp.appspot.com/index.php">Deployed link</a> </br>
                        Credentials: username: admin, password: admin </br>
                        </br>
                        - Login (/login.php): to prevent unauthorized users from access data and perform actions </br>
                        </br>
                        The application has 5 navlinks: </br>
                        - Home (/): index.php page, the introduction page, the homepage. If link not found, it will redirect to 404.php </br>
                        - Listing (/listing.php): use to display all lecturers, use to start create, edit and delete </br>
                        - Add new (/addnew.php): use the same form to handle both add new and update entity, based on the situation the title and navlink will change </br>
                        - BigQuery (/bigqueyr.php): using the dataset provided by lecturer and using the current list of lecturers to search and count how many name dataset have for each name </br>
                        - Logout (/logout.php): logout the session </br>
                        </br>
                        What I had done: </br>
                        - CRUD on Lecturer entity </br>
                        - Google Big Query </br>
                    </p>
                </div>
            </div>
            <div class="col-md-4 cliente right-title"> 
                <h1>Contact me</h1>
                <p>
                   Giff me HD JSC
                </p>
                <h3>Phones</h3>
                <p>0906969696</p>
                <h3>Email</h3>
                <p>Ayy.lmao@alohabanana.com</p>
            </div>
        </div>
        <div class="extra-padding-bottom-10px"></div>
    </div>

<?php include('includes/footer.php'); ?>    
