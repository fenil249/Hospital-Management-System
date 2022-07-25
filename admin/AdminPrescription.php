<?php
    session_start();
    $show="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
</head>
<body>

    <?php
        include("../include/header.php");
        include("../include/connection.php");


        //if(isset($_GET['id'])){
          //  $id = $_GET['id'];
            //$query = "SELECT * FROM book WHERE id='$id'";
            //$res = mysqli_query($connect, $query);
            //$row = mysqli_fetch_array($res);
        //}
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php");

                        //$ad = $_SESSION['doctor'];

                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            //$query = "SELECT * FROM book WHERE id='$id'";
                            //$res = mysqli_query($connect, $query);
                            //$row = mysqli_fetch_array($res);
                            $query = "SELECT * from book WHERE id='$id'";
                            $res = mysqli_query($connect, $query);
                    
                            while($row = mysqli_fetch_array($res)){
                            $p_id = $row['p_id'];
                            $d_id = $row['d_id'];
                            $date=$row['date'];
                            $stime=$row['stime'];
                            $etime=$row['etime'];
    
                            }
                        }
                       
                    ?>
                </div>

                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                  <h4 style="margin-top:20px; margin-bottom:20px; font-weight:bold;">Prescription </h4>

                                    <?php
                                        if(isset($_POST['update'])){
                                            $profile = $_FILES['profile']['name'];
                                            $des=$_POST['des'];

                                            $error = array();
                                            if(empty($profile)){
                                               $error['p'] = "Enter Image";
                                                
                                            }
                                            else if(empty($des)){
                                                $error['p'] = "Write Prescription";
                                            }
                                            else{
                                                $query = "INSERT INTO prescription(b_id,p_id,d_id,date,stime,etime,prescription,profile)  VALUES('$id','$p_id','$d_id','$date','$stime','$etime','$des','$profile')";
                                                $result = mysqli_query($connect, $query);

                                                if($result){
                                                    move_uploaded_file($_FILES['profile']['tmp_name'], "../img/$profile");
                                                }
                                                //header("Location:patient.php");
                                            }

                                            if(isset($error['p']))
                                            {
                                                $s = $error['p'];
                                                $show ="<h5 class='text-center alert alert-danger'>$s</h5>";
                                            }
                                            else
                                            {
                                                $show="<h5 class='text-center alert alert-success'>Successfully Prescription added</h5>";
                                            }
                                            
        
                                            
                                        }
                                    ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                   
                                    <!-- echo "<img src='img/$profiles' class='col-md-12' style='height:200px; width:200px;'>"; -->
                                       <div>
                                            <?php
                                                echo $show;
                                            ?>
                                        </div>

                                    
                                    <div class="form-group">

                                        <label>Add prescription image</label>
                                        
                                        <input type="file" name="profile" class="form-control">
                                        <br>
                                        <label>Add description</label>
                                        
                                        <textarea name="des" id="" cols="30" rows="5" class="form-control"></textarea>

                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="SUBMIT"  class='btn btn' style='background:#65aca0; color:white;'>
                                    <a href="patient.php" class='btn btn' style='background:#65aca0; color:white;'>BACK</a>
                                </form>
                    <br>


                                
                                </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    
    
</body>
</html>