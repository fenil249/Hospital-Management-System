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

        $ad = $_SESSION['doctor'];
        $query = "SELECT * from doctors WHERE username='$ad'";
        $res = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($res)){
         $did=$row['id'];
         $name=$row['firstname'];
        }

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("dsidenav.php");
                    ?>
                </div>

                <div class="col-md-10">
                    <h5 class="text-center my-3">My Prescription</h5>

                    <?php

                        $query = "SELECT * FROM prescription WHERE d_id='$did' ORDER BY date";
                        $res = mysqli_query($connect, $query);

                        
                        $output = "";
                        $output .= "
                            <table class='table table-bordered text-center'>
                                <tr>
                                    <td>Patient ID</td>
                                    <td>Patient Name</td>
                                    <td>Date</td>
                                    <td>Prescription</td>
                                    <td>info</td>
                        ";

                        if(mysqli_num_rows($res) < 1){
                            $output .= "
                                <tr>
                                    <td class='text-center' colspan='10'> No Prescription Yet </td>
                                </tr>
                            ";
                        }

                        while($row = mysqli_fetch_array($res)){
                            $did=$row['p_id'];
                            
                             $query1 = "SELECT * FROM patient WHERE id='$did'";
                             $res1 = mysqli_query($connect, $query1);
                             while($row1 = mysqli_fetch_array($res1)){
                                 $dname=$row1['firstname'];
                                
                             }


                            $output .= "
                                <tr>
                                    <td>".$row['p_id']."</td>
                                    <td>$dname</td>
                                    <td>".$row['date']."</td>
                                    
                                    <td>
                                        <a href='new2.php?id=".$row['id']."'> 
                                            <button class='btn btn-secondary'>View</button>
                                        </a>
                                    </td>
                                    <td>
                                    <a href='view.php?id=".$row['id']."'> 
                                    <button class='btn btn-info'>View</button>
                                    </a>
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