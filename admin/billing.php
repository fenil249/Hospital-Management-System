<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Patient</title>
</head>
<body>

    <?php
        include("../include/header.php");
        include("../include/connection.php");

        // $ad = $_SESSION['p'];
        // $query = "SELECT * from patient WHERE username='$ad'";
        // $res = mysqli_query($connect, $query);
        // while($row = mysqli_fetch_array($res)){
        //  $pid=$row['id'];
        //  $name=$row['firstname'];
        // }

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>

                <div class="col-md-10">
                    <h5 class="text-center my-3">Generate Bill</h5>

                    <?php

                        $query = "SELECT * FROM book WHERE doctorstatus='Aprroved' and payment='Pending' ";
                        $res = mysqli_query($connect, $query);


                        while($row1=mysqli_fetch_array($res))
                        {
                            $pid=$row1['p_id'];
                        }
                        
                        
                        $query2="SELECT * FROM ecase WHERE pid='$pid'";
                        $res2=mysqli_query($connect,$query2);
                        while($row2=mysqli_fetch_array($res2))
                        {
                            $caseid=$row2['caseid'];
                        }

                        $query = "SELECT * FROM book WHERE doctorstatus='Aprroved' and payment='Pending' ";
                        $res = mysqli_query($connect, $query);
                        
                        $output = "";
                        $output .= "
                            <table class='table table-bordered text-center'>
                                <tr>
                                    <td>Booking ID</td>
                                    <td>Case ID</td>
                                    <td>Patient ID</td>
                                    <td>Patient Name</td>
                                    <td>Date</td>

                                    <td>Bill</td>
                        ";

                        if(mysqli_num_rows($res) < 1){
                            $output .= "
                                <tr>
                                    <td class='text-center' colspan='10'> No Patients Yet </td>
                                </tr>
                            ";
                        }

                        while($row = mysqli_fetch_array($res)){
                            
                        
                            $dummy=$row['bill'];
                            //$dummy2=$row['payment'];

                            $output1='';
                                                    
                            if ($dummy == 'Pending') {
                            $output1='<a href="gBill.php?id='.$row['id'].'"><button class="btn btn-success">Generate Bill</button></a>';
                            } else {
                                $output1='<a href="#"><button class="btn btn-info">Generated</button></a>';     
                            }
                                
                            $ppid=$row['p_id'];
                            $query5="SELECT * FROM ecase WHERE pid= '$ppid'";
                            $res5=mysqli_query($connect,$query5);
                            
                            while($row5=mysqli_fetch_array($res5))
                            {
                                $caseid=$row5['caseid'];
                            }
                            $output .= "
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>$caseid</td>
                                    <td>".$row['p_id']."</td>
                                    <td>".$row['pname']."</td>
                                    <td>".$row['date']."</td>
                                    
                                    <td>$output1
                                    </td>
                                </tr>
                            ";
                        }

                        $output .= "
                            </tr>
                            </table>
                        ";

                        echo $output;

                    ?>
                    
                        
                </div>
            </div>
        </div>
    </div>

</body>
</html>