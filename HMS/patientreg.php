<?php

include("include/connection.php");

if(isset($_POST['login'])){
    $fname=$_POST['fname'];
    $sname=$_POST['sname'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];

    $query1 = "SELECT * FROM patient WHERE username='$uname' ";
    $result1 = mysqli_query($connect, $query1);

    $error=array();

    if(empty($fname)){
        $error['ac']="Enter Firstname";
    }else  if(empty($sname)){
        $error['ac']="Enter Username";
    }else  if(empty($uname)){
        $error['ac']="Enter Firstname";
    }else  if(empty($email)){
        $error['ac']="Enter Firstname";
    }else  if(empty($phone)){
        $error['ac']="Enter Phone Number";
    }else  if($gender==""){
        $error['ac']="Enter Gender";
    }else  if(empty($city)){
        $error['ac']="Enter City";
    }else  if(empty($pass1)){
        $error['ac']="Enter Password";
    }else  if($pass1!=$pass2){
        $error['ac']="Both password do not match";
    }else if(mysqli_num_rows($result1) != 0){
        $error['ac'] ="Username already exist";
    }

    if(count($error)==0){

        $query= "INSERT INTO patient(firstname,surname,username,email,phone,gender,country,password,date_reg,profile) VALUES ('$fname','$sname','$uname','$email','$phone','$gender','$city','$pass1',NOW() ,'patientdp.jpg' )";

        $res=mysqli_query($connect,$query);

        if($res){
            header("Location:patientlogin.php");
        }
        else "<script>alert('failed')</script>";
    }
    }

    if(isset($error['ac']))
    {
        $s = $error['ac'];
        $show ="<h5 class='text-center alert alert-danger'>$s</h5>";
    }
    else
    {
        $show="";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
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
                <div style="margin-top: 0px;" class="col-md-6 jumbotron">
                    <img style="margin-top: 10px;" src="img/patientlogin.jpg" height="250" class="col-md-12">
                    <form method="post" class="my-2">

                        <div >
                        <div>
                    <?php
                        echo $show;
                    ?>
                </div>
                        </div>

                        <div style="margin-top: 50px; margin-left: 30px; margin-right: 30px; color: black; " class="form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="fname" autocomplete="off" placeholder="Enter Firstname">
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" placeholder="Enter Surname">
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" placeholder="Enter Username">
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email">
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Phone</label>
                            <input type="Number" name="phone" class="form-control" placeholder="Enter Phone Number">
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter Your City">
                        </div>

                       

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass1" class="form-control" placeholder="Enter Password">
                        </div>

                        <div style="margin:30px; color: black;" class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="pass2" class="form-control" placeholder="Enter Confirm Password">
                        </div>

                       
                       


                        <input style="margin-left: 250px; margin-top: 0px; margin-bottom: 30px;" type="submit" class="btn btn-success" name="login" value="Create Account">
                        <div style="margin-bottom:20px; margin-left:210px; color:black;">
                        <span>Already have an account? <a href="patientlogin.php" style="text-decoration:none;">Login</a></span>
                            </div>
                    </form>
                   
                     
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