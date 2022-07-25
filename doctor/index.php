<?php
session_start();
?>  

<!DOCTYPE html>
<html>
<head>
  <title>Doctor Dashboard</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row" style="background-image: url(../img/bg-1.jpg); background-size:100% 100%; background-:0.7;">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("dsidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                <h3 class="text-center my-3;" style="font-weight:bold; color:#3a625f; margin:15px;">Doctor Dashboard </h3>

                    <div class="col-md-12">
                        <div class="row">
                            
                                <div class="col-md-3 bg-info mx2 " style="height:150px; margin-right:50px">

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Profile</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="profile.php">
                                                        <i class="fa fa-user-circle fa-3x my-4" style="color : white;"></i>
                                                        <!-- <i class="bi bi-person-circle" style="color : black;"></i> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-3 bg-warning mx2 " style="height:150px;margin-right:50px">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8" style="margin-top:20px;">

                                                    <?php
                                                        $p = mysqli_query($connect, "SELECT * FROM patient");
                                                        $pp = mysqli_num_rows($p);
                                                    ?>

                                                    <h5 class="text-white" style="font-size : 25px">Total</h5>
                                                    <h5 class="text-white" style="font-size : 25px">Patient</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="new1.php">
                                                        <i class="fas fa-procedures fa-3x my-4" style="color : white;"></i>
                                                        <!-- <i class="bi bi-person-circle" style="color : black;"></i> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-3 bg-success mx2 " style="height:150px;margin-right:50px">
                                         <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8" style="margin-top:20px;">
                                                <?php
                                                        $p = mysqli_query($connect, "SELECT * FROM book where doctorstatus='Pending' and adminstatus='Aprroved'");
                                                        $pp = mysqli_num_rows($p);
                                                    ?>
                                                    <h5 class="text-white" style="font-size : 25px" ></h5>
                                                    <h5 class="text-white" style="font-size : 25px" >Total</h5>
                                                    <h5 class="text-white" style="font-size : 25px">Appointmemnt</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="dbookreq.php">
                                                        <i class="fa fa-calendar fa-3x my-4" style="color : white;"></i>
                                                        <!-- <i class="bi bi-person-circle" style="color : black;"></i> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>