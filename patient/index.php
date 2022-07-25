<?php
session_start();
?>  
<!DOCTYPE html>
<html>
<head>
  <title>Patient Dashboard</title>
</head>
<body>
    <?php
    include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row" style="background-image: url(../img/bg-1.jpg); background-size:100% 100%; background-:0.7;">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("psideNav.php");
                    ?>
                </div>
                <div class="col-md-10" >
                    <h3 class="text-center my-3;" style="font-weight:bold; color:#3a625f; margin:15px;">Patient Dashboard </h3>

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
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">Book Appointmemnt</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="book2.php">
                                                        <i class="fa fa-calendar fa-3x my-4" style="color : white;"></i>
                                                        <!-- <i class="bi bi-person-circle" style="color : black;"></i> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-3 bg-secondary mx2 " style="height:150px;margin-right:50px">
                                         <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Prescription</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="myPrescription.php">
                                                    <!-- <i class="fas fa-file-medical-alt"></i> -->
                                                        <i class="fas fa-file-medical-alt fa-3x my-4" style="color : white;"></i>
                                                        <!-- <i class="bi bi-person-circle" style="color : black;"></i> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-3 bg-danger mx2 my-3" style="height:150px;margin-right:50px">
                                         <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Appointment</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="pbookreq.php">
                                                    <!-- <i class="fas fa-calendar"></i> -->
                                                        <i class="fas fa-calendar-check fa-3x my-4" style="color : white;"></i>
                                                        <!-- <i class="bi bi-person-circle" style="color : black;"></i> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-3 bg-success mx2 my-3 " style="height:150px;margin-right:50px">
                                         <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Invoice</h5>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="billing.php">
                                                        <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color : white;"></i>
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