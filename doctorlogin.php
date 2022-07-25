<?php

session_start();

include("include/connection.php");

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
    $row=mysqli_fetch_array($result);

    if(empty($username)){
        $error['doctor'] = "Enter Username";
    }else if(empty($password)){
        $error['doctor'] = "Enter Password";
    }else if(mysqli_num_rows($result) == 0){
        $error['doctor'] = "Invalid Username or Password";
    }else if($row['status']=='Pendding'){
        $error['doctor'] = "Please Wait For the admin to confirm";
    }else if($row['status']=='Rejected'){
        $error['doctor'] = "Your request has been rejected";
    }


    if(count($error) == 0){
        $query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('You have Login as Patient')</script>";

            $_SESSION['doctor'] = $username;

            header("Location:doctor/index.php");
            exit();
        }

        else{
            echo "<script>alert('Invalid username or password')</script>";
           // $error['doctor'] = "123";
            header("Location:doctorlogin.php");
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
<body>
    
    <?php
        include("include/header.php");
    ?>

<div class="container" style="margin-top:150px;">
        <div class="title" >Doctor Login</div>
        <?php
        if(isset($error['doctor'])){
            $sh = $error['doctor'];
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

            <div style="margin-bottom:5px; margin-top:5px; margin-left:175px; color:black;">
                <span">Don't have an account?</span>
                <a href="apply.php" style="text-decoration:none; color:#65aca0">Create Account</a> 
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