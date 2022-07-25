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
                    <h5 class="text-center my-3">Total Patient</h5>

                    <?php
                     $ad = $_SESSION['doctor'];
                     $query = "SELECT * from doctors WHERE username='$ad'";
                      $res = mysqli_query($connect, $query);
                 
                     while($row = mysqli_fetch_array($res)){
                     $d_id= $row['id'];
                    }

                        $query = "SELECT * FROM book where doctorstatus='Aprroved' and d_id='$d_id' ORDER BY date";
                        $res = mysqli_query($connect, $query);

                                                $output = "";
                        $output .= "
                            <table class='table table-bordered text-center'>
                                <tr>
                                    <td>ID</td>
                                    <td>Patient Name</td>
                                    <td>Date</td>
                                    <td>Prescription</td>
                                    <td>Info</td>

                                    
                                
                        ";

                        if(mysqli_num_rows($res) < 1){
                            $output .= "
                                <tr>
                                    <td class='text-center' colspan='10'> No Patient Yet </td>
                                </tr>
                            ";
                        }

                        while($row = mysqli_fetch_array($res)){

                        
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
                                   
                                    $query2 = "SELECT * FROM prescription WHERE d_id='$d_id'";
                                    $res2 = mysqli_query($connect, $query2);
                                    // while($row2 = mysqli_fetch_array($res2))
                                    // {
                                    //     $tid=$row['id'];
                                    // }

                            $output .= "
                                <tr >
                                    <td>".$row['id']."</td>
                                    <td>".$row['pname']."</td>
                                    <td>".$row['date']."</td>
                                    <td>
                                    
                                            <a href='Prescription.php?id=".$row['id']."'> 
                                            <button class='btn btn' style='background:#65aca0; color:white;'>Prescription</button>
                                            </a>
                                         </td>
                                     <td>
                                            <a href='view.php?id=".$row['p_id']."'> 
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