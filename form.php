<?php 
    session_start();
    include 'dbconfig.php';

    $_SESSION['message'] = '';

    $db = mysqli_connect('localhost', 'root', 'root', 'crud', 8889);
        
    if(isset($_POST['register'])) {
        $username = mysql_real_escape_string($_POST['username']);
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $confirmpassword = mysql_real_escape_string($_POST['confirmpassword']);

        if($password == $confirmpassword) {
            // $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO register (username, password, email) VALUES('$username', '$password', '$email')";
            mysql_query($db, $sql);
            header('Location: login.php');
        } else {
            $_SESSION['message'] = "Two passwords does not match";
        }
    } 
?>

<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="register.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="header">
        <h1>Register</h1>
    </div>
    <form action="form.php" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" class="textInput"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td>Confirm password:</td>
                <td><input type="text" name="confirmpassword" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html>