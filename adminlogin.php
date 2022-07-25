<?php

session_start();

include("include/connection.php");

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
    $row=mysqli_fetch_array($result);

    if(empty($username)){
        $error['admin'] = "Enter Username";
    }

    else if(empty($password)){
        $error['admin'] = "Enter Password";
    }
    else if(mysqli_num_rows($result) == 0){
        $error['admin'] = "Invalid Username or Password";
    }

    if(count($error) == 0){
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('You have Login as admin')</script>";

            $_SESSION['admin'] = $username;

            header("Location:admin/index.php");
            exit();
        }

        else{
            //echo "<script>alert('Invalid username or password')</script>";
            header("Location:adminlogin.php");
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
    <title>Admin Login</title>
</head>
<body>
    
    <?php
        include("include/header.php");
    ?>

    <!-- <div style="margin-top: 20px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div style="margin-top: 0px;" class="col-md-6 jumbotron">
                    <img style="margin-top: 10px;" src="img/adlogin.jfif" class="col-md-12">
                    <form method="post" class="my-2">

                        <div >
                            <?php
                                if(isset($error['admin'])){
                                    $sh = $error['admin'];
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
                            <input type="password" name="pass" class="form-control" placeholder="Enter password">
                        </div>

                        <input style="margin-left: 30px; margin-top: 0px; margin-bottom: 50px;" type="submit" class="btn btn-success" name="login" value="Login">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div> -->

    <div class="container" style="margin-top:150px;">
        <div class="title" >Admin Login</div>

        <?php
            if(isset($error['admin'])){
                $sh = $error['admin'];
                $show = "<h6 class='alert alert-danger'>$sh</h6>";
            }

            else{
                $show = "";
            }

            echo $show;
        ?>
            
        <form action="" method="post" >
            
            <div class="user-details">
                
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="uname"  placeholder="Enter Username" required>
                </div>
                
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="pass" placeholder="Enter Password" required>
                </div>
            </div>

            <div class="btn-1">
                <input type="submit" name="login" value="Login">
            </div>

        </form>
    </div> 

</body>

<style>
    .jumbotron {
    background-color: #E0E0E0;
    color: white;
    margin: auto;
    width: 50%;
    }

    body{
        height: 100vh;
        /* background: linear-gradient(135deg, #FFFFE0, #09877de0);  */
        background-image: url(img/loginbg.jpg);
        background-repeat: no-repeat; 
        background-size: cover;
    }

    .container{
        max-width: 700px;
        width: 100%;
        background: #fff;
        padding: 25px 35px;
        border-radius: 20px;
    }

    .container .title{
        font-size: 30px;
        text-align: center;
        font-weight: 500;
        position: relative;
    }

    .container form .user-details{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 12px 0 12px 0;
    }

    form .user-details .input-box {
        width: calc(100%/2 - 20px);
        margin-bottom: 15px;
    }

    form .user-details .input-box .details{
        font-weight: 500;
        margin-bottom: 10px;
        display: block;
    }

    form .user-details .input-box input{
        height: 45px;
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 15px;
        border-bottom-width: 2px;
    }

    form .user-details .input-box textarea{
        outline: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 15px;
        padding-top: 5px;
        font-size: 15px;
        border-bottom-width: 2px;
    }

    form btn-1{
        align-items: center;
        justify-content: center;
    }

    form .btn-1 input{
        height: 50px;
        width: 630px;
        color: #fff;
        background: #65aca0;
        font-weight: 700;
        font-size: 18px;
        border-radius: 5px;
        letter-spacing: 2px;
        /* background: linear-gradient(135deg, #FFFFE0, #B22222); */
        border: none;
    }

    form .btn-1 input:hover{
        opacity: 0.7;
        cursor: pointer;
    }
</style>

</html>