<?php
    session_start();

    include 'dbconfig.php';
    
    $mysqli = new mysqli($hostname, $username, $password, $dbname, $port) or die(mysqli_error($mysqli));
    
    //set all the post variables
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);

    //the form has been submitted with post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        //TODO: check for existed username and email

        //two passwords are equal to each other
        if ($_POST['password'] == $_POST['confirmpassword']) {
            
            //salt 12
            $options = ['cost' => 12];
            $hashedpw = password_hash($password, PASSWORD_BCRYPT, $options);
            
            //set session variables
            $_SESSION['username'] = $username;

            //insert user data into database
            $sql = "INSERT INTO users (username, password, email, level) "
                    . "VALUES ('$username', '$hashedpw', '$email', '0')";
            
            //if the query is successsful
            if ($mysqli->query($sql) === true){
                header("location: login.php");
            }
            else {
                $_SESSION['msg_type'] = "danger";
                $_SESSION['message'] = 'User could not be added to the database!';
            }
            $mysqli->close();  
        }
        else {
            $_SESSION['msg_type'] = "warning";
            $_SESSION['message'] = 'Two passwords do not match!';
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="./stylesheets/login.css">
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
    <body class="bg-dark" style="background: url(https://i.imgur.com/6WSGUoc.png) no-repeat center center fixed;">
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

        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white mb-4">Register</h2>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <!-- form card login -->
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h3 class="mb-0">Register</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                        <div class="form-group">
                                            <label for="uname1">Username</label>
                                            <input type="text" class="form-control form-control-lg rounded-0" name="username" id="uname1" required="">
                                            <div class="invalid-feedback">Oops, you missed this one.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="uname1">Email</label>
                                            <input type="text" class="form-control form-control-lg rounded-0" name="email" id="email1" required="">
                                            <div class="invalid-feedback">Oops, you missed this one.</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" name="password" id="pwd1" required="" autocomplete="new-password">
                                            <div class="invalid-feedback">Enter your password too!</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm password</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" name="confirmpassword" id="pwd2" required="" autocomplete="new-password">
                                            <div class="invalid-feedback">Enter your password too!</div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-success btn-lg float-right" id="btnLogin">Register</button>
                                    </form>
                                </div>
                                <!--/card-block-->
                            </div>
                            <!-- /form card login -->
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
        <!--/container-->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    </body>
</html>