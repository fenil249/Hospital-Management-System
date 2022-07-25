<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

    <?php

    include("../include/header.php");
    include("../include/connection.php");



    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row" style="background-image: url(../img/bg-1.jpg); background-size:100% 100%; background-:0.7;">
                
                   <div class="col-md-2" style="margin-left : -30px;">

                            <?php
                            include("sidenav.php");
                            ?>


                    </div>

                    <div class ="col-md-10">
                    <h3 class="text-center my-3;" style="font-weight:bold; color:#3a625f; margin:15px;">Admin Dashboard </h3>

                            <div class="col-md-12 my-1">

                                <div class="row">

                                    <div class="col-md-3  bg-success mx-2"  style="height : 130px; ">

                                        <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">

                                                    <?php
                                                    $ad=mysqli_query($connect , "SELECT * FROM admin");
                                                    $num=mysqli_num_rows($ad);
                                                    ?>

                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $num; ?></h5>
                                                    <h5 class="text-white">Total</h5>
                                                    <h5 class="text-white">Admin</h5>
                                                 </div>
                                                <div class="col-md-4">
                                                    <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3  bg-warning mx-2"  style="height : 130px; ">

                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">

                                                    <?php
                                                    $doc=mysqli_query($connect , "SELECT * FROM doctors WHERE status='Aprroved'");
                                                    $num2=mysqli_num_rows($doc);
                                                    ?>
                                                    <h5 class="my-2 text-white" style="font-size :30px;"><?php echo $num2; ?></h5>
                                                    <h5 class="text-white">Total</h5>
                                                    <h5 class="text-white">Doctor</h5>
                                                 </div>
                                                <div class="col-md-4">
                                                    <a href="doctor.php"><i class="fa fa-user-md fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3  bg-primary mx-2"  style="height : 130px; ">

                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">

                                                    <?php
                                                        $p = mysqli_query($connect, "SELECT * FROM patient");
                                                        $pp = mysqli_num_rows($p);
                                                    ?>

                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $pp;?></h5>
                                                    <h5 class="text-white">Total</h5>
                                                    <h5 class="text-white">Patient</h5>
                                                 </div>
                                                <div class="col-md-4">
                                                    <a href="patient.php"><i class="fa fa-procedures fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3  bg-danger mx-2 my-2"  style="height : 130px; ">
                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">
                                                    
                                                

                                                    <h5 class="my-2 text-white"style="font-size :30px;"></h5>
                                                    <h5 class="text-white" style="font-size :25px; margin-top:20px;">Schedule</h5>
                                                    <h5 class="text-white" style="font-size :25px;">Slots</h5>
                                                 </div>
                                                <div class="col-md-4">
                                                    <a href="bookschedule.php"><i class="fa fa-calendar fa-3x my-4" style="color : white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3  bg-info mx-2 my-2"  style="height : 130px; ">

                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                    $ad=mysqli_query($connect , "SELECT * FROM doctors WHERE status='Pendding'");
                                                    $num=mysqli_num_rows($ad);
                                                    ?>
                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $num; ?></h5>
                                                    <h5 class="text-white">Counsulting</h5>
                                                    <h5 class="text-white">Doctor-Request</h5>
                                                 </div>
                                                <div class="col-md-4">
                                                    <a href="jobreq.php"><i class="fa fa-book-open fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3  bg-secondary mx-2 my-2"  style="height : 130px; ">
                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">

                                                <?php
                                                        $ad=mysqli_query($connect , "SELECT * FROM scheduleslot WHERE date > ".date("Y-m-d")."");
                                                        $num=mysqli_num_rows($ad);
                                                    ?>
                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $num; ?></h5>
                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;">0</h5> -->
                                                    <h5 class="text-white" >Scheduled</h5>
                                                    <h5 class="text-white" >Slots</h5>

                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;">0</h5> -->
                                                    <!-- <h5 class="text-white" style="font-size :25px; margin-top:20px;">Scheduled</h5>
                                                    <h5 class="text-white" style="font-size :25px;">Slots</h5> -->
                                                 </div>
                                                <div class="col-md-4">
                                                <!-- <i class="fas fa-alarm-plus"></i> -->
                                                    <a href="totalslot.php"><i class="fas fa-user-clock fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3  bg-warning mx-2 my-2"  style="height : 130px; ">
                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">
                                
                                                    <?php
                                                   $dummy=date("Y/m/d");
                                                    //$dummy=date('Y-m-d', strtotime(' +1 day'));
                                                    $query="SELECT * FROM token WHERE date='$dummy'";
                                                    $res=mysqli_query($connect,$query);
                                                    $num=mysqli_num_rows($res);

                                                    ?>
                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $num; ?></h5>
                                                    <h5 class="text-white" style="font-size :22px;">View</h5>
                                                    <h5 class="text-white" style="font-size :22px;">Appointment</h5>
                                                 </div>
                                                 <!-- <i class="fas fa-calendar-check"></i> -->
                                                <div class="col-md-4">
                                                    <a href="token.php"><i class="fas fa-calendar-check fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3  bg-primary mx-2 my-2"  style="height : 130px; ">
                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                    $ad=mysqli_query($connect , "SELECT * FROM book WHERE adminstatus='Pending'");
                                                    $num=mysqli_num_rows($ad);
                                                ?>
                                                    

                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;"></h5> -->
                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $num; ?></h5>
                                                    <h5 class="text-white">Appointment</h5>
                                                    <h5 class="text-white" >Request</h5>
                                                 </div>
                                                <div class="col-md-4">
                                                    <a href="bookreq.php"><i class="fas fa-plus fa-3x my-4" style="color : white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3  bg-success mx-2 my-2"  style="height : 130px; ">
                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                    $ad=mysqli_query($connect , "SELECT * FROM book WHERE doctorstatus='Aprroved' and payment='Pending'");
                                                    $num=mysqli_num_rows($ad);
                                                ?>
                                                    

                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;"></h5> -->
                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $num; ?></h5>
                                                  
                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;">0</h5> -->
                                                    <h5 class="text-white" style="font-size :22px; ">Generate</h5>
                                                    <h5 class="text-white" style="font-size :22px;">Bill</h5>
                                                 </div>
                                                 <!-- <i class="fas fa-file-invoice-dollar"></i> -->
                                                 <!-- <i class="fas fa-calendar-check"></i> -->
                                                <div class="col-md-4">
                                                    <a href="billing.php"><i class="fas fa-file-invoice-dollar fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3  bg-secondary mx-2 my-2"  style="height : 130px; ">
                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                    $ad=mysqli_query($connect , "SELECT * FROM book WHERE doctorstatus='Aprroved' and payment='Pending'");
                                                    $num=mysqli_num_rows($ad);
                                                ?>
                                                    

                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;"></h5> -->
                                                    <h5 class="my-2 text-white"style="font-size :30px;"><?php echo $num; ?></h5>
                                                  
                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;">0</h5> -->
                                                    <h5 class="text-white" style="font-size :22px; ">Report &</h5>
                                                    <h5 class="text-white" style="font-size :22px;">Prescription</h5>
                                                 </div>
                                                 <!-- <i class="fas fa-calendar-check"></i> -->
                                                <div class="col-md-4">
                                                    <a href="prescription.php"><i class="fas fa-file-medical-alt fa-3x my-4"style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3  bg-danger mx-2 my-2"  style="height : 130px; ">
                                    <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-8">
                                                    <!-- <h5 class="my-2 text-white"style="font-size :30px;">0</h5> -->
                                                    <h5 class="text-white" style="font-size :25px; margin-top:20px;">Instant</h5>
                                                    <h5 class="text-white" style="font-size :25px;">Booking</h5>
                                                 </div>
                                                <div class="col-md-4">
                                                    <a href="instbooking.php"><i class="fas fa-hospital-user fa-3x my-4"style="color:white;"></i></a>
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