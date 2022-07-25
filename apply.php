<?php

include("include/header.php");
include("include/connection.php");

if(isset($_POST['apply'])){

    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $spe = $_POST['spe'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];
    
    $query1 = "SELECT * FROM doctors WHERE username='$username' ";
    $result1 = mysqli_query($connect, $query1);
    
    $error = array();

    if(empty($firstname)){
        $error['apply'] = "Enter Firstname";
    }
    else if(empty($surname)){
        $error['apply'] = "Enter Surname";
    }
    else if(empty($username)){
        $error['apply'] = "Enter Username";
    }
    else if(empty($email)){
        $error['apply'] = "Enter Email Address";
    }
    else if($gender == ""){
        $error['apply'] = "Select your Gender";
    }
    else if(empty($phone)){
        $error['apply'] = "Enter Phone Number";
    }
    else if($spe == ""){
        $error['apply'] = "Select your Country";
    }
    else if(empty($password)){
        $error['apply'] = "Enter Password";
    }
    else if($confirm_password !=$password){
        $error['apply'] = "Both Password do not match";
    }else if(mysqli_num_rows($result1) != 0){
        $error['apply'] ="Username already exist";
    }
    

    if(count($error) == 0){
        $query2= "SELECT s_id FROM specialization WHERE spe='$spe'";
        $result2 = mysqli_query($connect, $query2);

        while($row = mysqli_fetch_array($result2)){
            $sid = $row['s_id'];
        }

        $query = "INSERT INTO doctors(firstname,surname,username,email, gender,phone,specialization,s_id,password,salary,date_reg,status,profile) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$spe','$sid','$password','0',NOW(),'Pendding','doctordp.jpg')";
        

        $result = mysqli_query($connect, $query);

        if($result)
        {
            echo "<script>alert('You have Successfully Applied')</script>";
            header("Location:doctorlogin.php");
        }

        else{
            echo "<script>alert('Failed')</script>";
        }
    }
}

if(isset($error['apply']))
{
    $s = $error['apply'];
    $show ="<h5 class='text-center alert alert-danger'>$s</h5>";
}
else
{
    $show="";
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Apply Now!!</title>
</head>
<body>

<div class="container" style="margin-top:20px;">
        <div class="title" >Apply Now</div>

        <?php
            echo $show;
        ?>
            
        <form action="" method="post" >
            
            <div class="user-details">
                
                <div class="input-box">
                    <span class="details">Firstname</span>
                    <input type="text" name="fname"  placeholder="Enter Firstname" required>
                </div>
                
                <div class="input-box">
                    <span class="details">Surname</span>
                    <input type="text" name="sname" placeholder="Enter Surname" required>
                </div>

                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="uname"  placeholder="Enter Username" required>
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email"  placeholder="Enter Email" required>
                </div>

                <div class="input-box">
                    <span class="details">Select gender</span>
                    <select name="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phone"  placeholder="Enter Phone number" required>
                </div>

                <div class="input-box">
                    <span class="details">Specialization</span>
                    <select name="spe" class="form-control">
                        <option value="">Select Specialization</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Psychiatrist">Psychiatrist</option>
                        <option value="Pediatrician">Pediatrician</option>
                        <option value="Gynecologist">Gynecologist</option>
                        <option value="Cardiologist">Cardiologist</option>
                        
                    </select> 
                </div>

                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="pass"  placeholder="Enter Password" required>
                </div>

                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="con_pass"  placeholder="Enter Confirm password" required>
                </div>
            </div>

            <div class="btn-1">
                <input type="submit" name="apply" value="Apply">
            </div>

            <span style="margin-left: 181px;">Already have an account?</span>
            <a href="doctorlogin.php" style="text-decoration:none; color:#65aca0">Create Account</a> 

        </form>
    </div> 

    <!-- <div class="container-fluid">
        <div class="col-md-12" style="color: black;">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron" style="margin-right:350px">
                <h5 class="text-center my-2" style="color: black">Apply Now!!</h5>
                <div>
                </div>

                <form method="post">
                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>First name</label>
                        <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter First name" value="<?php  if(isset($_POST['fname'])) echo $_POST['fname'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Surname</label>
                        <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php  if(isset($_POST['sname'])) echo $_POST['sname'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php  if(isset($_POST['uname'])) echo $_POST['uname'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php  if(isset($_POST['email'])) echo $_POST['email'];?>">
                    </div>
                    
                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Select Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select> 
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php  if(isset($_POST['phone'])) echo $_POST['phone'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Specialization</label>
                        <select name="spe" class="form-control">
                            <option value="">Select Specialization</option>
                            <option value="Dentist">Dentist</option>
                            <option value="Psychiatrist">Psychiatrist</option>
                            <option value="Pediatrician">Pediatrician</option>
                            <option value="Gynecologist">Gynecologist</option>
                            <option value="Cardiologist">Cardiologist</option>
                            
                        </select> 
                    </div>


                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                    </div>


                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                    </div>
                    
                    <input style="margin-left: 300px; margin-top: 10px; margin-bottom: 30px;" type="submit" name="apply" value="Apply Now" class="btn btn-success">

                    <p style="margin-left: 230px; color: black;">I already have an account? <a href="doctorlogin.php" style="text-decoration:none">login</a></p>














                </form> -->

                </div>
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