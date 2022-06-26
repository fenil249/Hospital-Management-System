<?php

session_start();

include("include/connection.php");

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $query = "SELECT * FROM patient WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
    $row=mysqli_fetch_array($result);

    if(empty($username)){
        $error['patient'] = "Enter Username";
    }
    else if(empty($password)){
        $error['patient'] = "Enter Password";
    }else if(mysqli_num_rows($result) == 0){
        $error['patient'] = "Invalid Username or Password";
    }
    

    if(count($error) == 0){
        $query = "SELECT * FROM patient WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('You have Login as Patient')</script>";

            $_SESSION['patient'] = $username;

            header("Location:patient/index.php");
            exit();
        }

        else{
            //echo "<script>alert('Invalid username or password')</script>";
            header("Location:patientlogin.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
</head>
<body style="background-image: url(img/bg.jfif); background-repeat: no-repeat; background-size: cover;">
    
    <?php
        include("include/header.php");
    ?>

    <div style="margin-top: 20px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div style="margin-top: 100px;" class="col-md-6 jumbotron">
                    <img style="margin-top: 10px;" src="img/patientlogin.jpg" height="250" class="col-md-12">
                    <form method="post" class="my-2">

                        <div >
                            <?php
                                if(isset($error['patient'])){
                                    $sh = $error['patient'];
                                    $show = "<h6 class='alert alert-danger'>$sh</h6>";
                                }

                                else{
                                    $show = "";
                                }

                                echo $show;
                            ?>
                        </div>

                        <div style="margin-top: 50px; margin-left: 30px; margin-right: 30px; color: black; " class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="uname" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>

                        <input style="margin-left: 275px; margin-top: 0px; margin-bottom: 30px;" type="submit" class="btn btn-success" name="login" value="Login">
                        
                    </form>
                    <div style="margin-bottom:20px; margin-left:175px; color:black;">
                      <span">Don't have an account?</span>
                      <a href="patientreg.php" style="text-decoration:none; color:blue">Create Account</a> 
                    </div>
                     
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

<style>
    .jumbotron {
    background-color: #E0E0E0;
    color: white;
    margin: auto;
    width: 50%;
    }
</style>

</html>