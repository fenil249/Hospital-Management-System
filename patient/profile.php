<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
</head>
<body>

    <?php
        include("../include/header.php");
        include("../include/connection.php");


        $ad = $_SESSION['patient'];
        $query = "SELECT * from patient WHERE username='$ad'";
        $res = mysqli_query($connect, $query);
    
        while($row = mysqli_fetch_array($res)){
            $username = $row['username'];
            $profiles = $row['profile'];
            $ppid=$row['id'];
        }

        
        $query2="SELECT * FROM ecase WHERE pid='$ppid'";
        $res2=mysqli_query($connect,$query2);
        while($row2=mysqli_fetch_array($res2))
        {
            $caseid=$row2['caseid'];
        }
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("psidenav.php");

                        $patient = $_SESSION['patient'];
                        $query = "SELECT * FROM patient WHERE username='$patient'";
                  
                        $res = mysqli_query($connect, $query);
                        $row = mysqli_fetch_array($res);
                    ?>
                </div>

                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $patient;?> Profile</h4>

                                <?php
                                    if(isset($_POST['update'])){
                                        $profile = $_FILES['profile']['name'];

                                        if(empty($profile)){

                                        }
                                        else{
                                            $query = "UPDATE patient SET profile='$profile' WHERE username='$patient'";
                                            $result = mysqli_query($connect, $query);

                                            if($result){
                                                move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                                            }
                                        }
                                    }
                                ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                    echo "<img src='img/$profiles' class='col-md-12' style='height:200px; width:200px;'>";
                                    ?>

                                    <br><br>
                                    <div class="form-group">
                                        <label>UPDATE PROFILE</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="UPDATE"  class="btn btn-success">
                                </form>


                                <br>

                                <table class="table table-bordered">
                                    
                                    

                                    <tr>
                                        <th colspan="2" class="text-center">My Details</th>
                                    </tr>
                                    <tr>
                                        <td>Case ID</td>
                                        <td><?php echo $caseid;?></td>
                                    </tr>

                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $row['username'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Phone No</td>
                                        <td><?php echo $row['phone'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender'];?></td>
                                    </tr>

                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $row['country'];?></td>
                                    </tr>

                                </table>

                            </div>

                          
                            <div class="col-md-6">
                                <?php
                                    if(isset($_POST['change'])){
                                        $uname = $_POST['uname'];

                                        if(empty($uname)){

                                        }

                                        else{
                                            $query = "UPDATE patient SET username='$uname' WHERE username='$patient'";
                                            $res = mysqli_query($connect, $query);

                                            if($res){
                                                $_SESSION['patient'] = $uname;
                                            }
                                        }
                                    }
                                ?>

                                <form action="" method="post">
                                    <label for="">Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off"><br>
                                    <input type="submit" name="change" class="btn btn-success" value="Change">
                                </form>
                                <br>

                                <?php

                                    if(isset($_POST['update_pass'])){
                                        $old_pass = $_POST['old_pass'];
                                        $new_pass = $_POST['new_pass'];
                                        $con_pass = $_POST['con_pass'];

                                        $error = array();
                                        $old = mysqli_query($connect, "SELECT * FROM  patient WHERE username='$patient'");

                                        $row = mysqli_fetch_array($old);
                                        $pass = $row['password'];

                                        if(empty($old_pass)){
                                            $error['p'] = "Enter Old Password";
                                        }

                                        else if(empty($new_pass)){
                                            $error['p'] = "Enter New Password";
                                        }

                                        else if(empty($con_pass)){
                                            $error['p'] = "Confirm Password";
                                        }

                                        else if($old_pass != $pass){
                                            $error['p'] = "Invalid Old Password";
                                        }

                                        else if($new_pass != $con_pass){
                                            $error['p'] = "New Password and Confirm Password Doesn't match";
                                        }

                                        if(count($error) == 0){
                                            $query = "UPDATE patient SET password = '$new_pass' WHERE username='$patient'";
                                            mysqli_query($connect, $query);
                                        }
                                    }

                                    if(isset($error['p'])){
                                        $e = $error['p'];
                                        $show = "<script>alert('$e')</script>";
                                    }

                                    else{
                                        $show = "";
                                    }

                                ?>

                                <form action="" method="post">
                                    <h5 class="text-center my-4">Change Password</h5>

                                    <div>
                                        <?php
                                            echo $show;
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control">
                                    </div>

                                    <input type="submit" name="update_pass" value="Update Password" class="btn btn-info" style="margin-top:20px; color:white;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>