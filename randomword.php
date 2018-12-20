<?php
    session_start();

    include 'dbconfig.php';

    //Token like system
    if(!isset($_SESSION['loginid'])){
        header("Location: login.php");
    } 
    $pageName = "listing.php"
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
        <title>English Learning System</title>
    </head>
    <body>
        <div class="aloha">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="myNav">
                <div class="container custom-nav">
                    <a href="index.php" class="navbar-brand">English Learning System</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
                        <ul class="navbar-nav ml-auto">
                            <!-- when admin login -->
                            <?php if($_SESSION['level'] == 1):?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item active">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item active">
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
                <h1>Random view word</h1>
            </div>
        </div>
            
        <div class="extra-padding-bottom-10px"></div>
        <div class="container">
            <?php require_once 'process.php'; ?>   
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show">
                    <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <?php
                $mysqli = new mysqli($hostname, $username, $password, $dbname, $port) or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM questions order by rand() limit 1") or die($mysqli->error);
                //pre_r($result);
            ?>
            <div class="extra-padding-bottom-10px"></div>

            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="row text-center transition-from-header">
                <div class="col-md-12 cliente right-title"> 
                    <h3>Word: <span style="color: #000000"><?php echo $row['word']?></span> </h3> 
                    <h3>Meaning: <span style="color: #000000"><?php echo $row['meaning']?></span></h3>
                    <h3>Similar word: <span style="color: #000000"><?php echo $row['similar']?></span></h3>
                    <h3>Example 1: <span style="color: #000000"><?php echo $row['eone']?></span></h3> 
                    <h3>Example 2: <span style="color: #000000"><?php echo $row['etwo']?></span></h3> 
                </div>
            </div>
        </div>

        <div class="text-center">
            <button value="Refresh Page" onClick="window.location.reload()" type="button" class="btn btn-outline-info continue-reading">Learn new word</button>
        </div>
        
        
        <div class="extra-padding-bottom-10px"></div>

                
                
                <!-- <div class="row justify-content-center">
                    <table class="table">
                        <tr>
                            <th>Word:</th>
                            <th><?php echo $row['word']?></th>
                        </tr>
                        <tr>
                            <th>Meaning:</th>
                            <th><?php echo $row['meaning']?></th>
                        </tr>
                        <tr>
                            <th>Similar word:</th>
                            <th><?php echo $row['similar']?></th>
                        </tr>
                        <tr>
                            <th>Example 1:</th>
                            <th><?php echo $row['eone']?></th>
                        </tr>
                        <tr>
                            <th>Example 2:</th>
                            <th><?php echo $row['etwo']?></th>
                        </tr>
                    </table>
                </div> -->
            <?php endwhile; ?>
        </div>

<?php include('includes/footer.php'); ?>    
