<?php
session_start();
include("../include/connection.php");

$show="";
if(isset($_POST['apply'])){

    $spe = $_POST['spe'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    
    
    $error = array();

    if($spe == ""){
        $error['apply'] = "Select Specialization";
    }
    else if($doctor == ""){
        $error['apply'] = "Select Doctor";
    }
    else if(empty($date)){
        $error['apply'] = "Select Date";
    } else if(empty($stime)){
        $error['apply'] = "Select Start Time";
    }else if(empty($etime)){
        $error['apply'] = "Select End Time";
    }

   
    

    if(count($error) == 0){
        
        $query2= "SELECT firstname FROM doctors WHERE id='$doctor'";
        $result2 = mysqli_query($connect, $query2);

        while($row1 = mysqli_fetch_array($result2)){
            $dname = $row1['firstname'];
        }

        $query3= "SELECT spe FROM specialization WHERE s_id='$spe'";
        $result3 = mysqli_query($connect, $query3);

        while($row2 = mysqli_fetch_array($result3)){
            $sname = $row2['spe'];
        }
        $query = "INSERT INTO scheduleslot(specialization,doctor,date,stime,etime) VALUES ('$sname','$dname','$date','$stime','$etime')";
        $result = mysqli_query($connect, $query);

        if($result)
        {
            //echo "<script>alert('You have Successfully Applied')</script>";
           // header("Location:bookschedule.php");
        }

        else{
            echo "<script>alert('Failed')</script>";
        }
    }
   

    if(isset($error['apply']))
{
$s = $error['apply'];
$show ="<h5 class='text-center alert alert-danger'>$s</h5>";
}
else {
$show="<h5 class='text-center alert alert-success'>Successfully Slot Scheduled</h5>";

}
    
       

}


    
    
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Country State City</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $(".spe").change(function(){
                var s_id=$(this).val();
                $.ajax({
                    url:"../tmp1.php",
                    method:"POST",
                    data:{s_id:s_id},
                    success:function(data){
                        $(".doctor").html(data);
                    }
                });
            });

        });
    </script>
</head>
<body style="margin: 30 px">
<?php
include("../include/header.php");
include("../include/connection.php");
?>
        
<div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php");

                    
                    ?>
                </div>
                <div class ="col-md-10"> 
                    <h2 style="margin-left:550px; margin-top:20px;">Schedule Slot</h2>
                    <div>
                    <?php
                        echo $show;
                    ?>
                </div> 
            <form method="post">

                    <div style="margin-top:0px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label >Specialization</label>
                        <select name="spe" class="spe form-control">
                            <option selected="selected" value="">Select Specialization</option>
                            <?php
                              $sql = mysqli_query($connect, "select * from specialization");

                              while($row = mysqli_fetch_array($sql)){
                                ?>
                                <option value="<?php echo $row['s_id'];?>">
                                <?php echo $row['spe'];?></option>
                                <?php
                              }  
                            ?>

                        </select>
                    
                        </div>
                        <div style="margin-top:25px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label >Doctor :</label>
                        <select name="doctor" class="doctor form-control" id="doctor">
                            <option selected="selected" value="">Select Doctor</option>
                        </select>
                        
                      </div>
                      <div style="margin-top:25px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                      <label>Date</label>
                      <input type="date" name="date" class="form-control" autocomplete="off" placeholder="Select Date">                   
                     </div>

                     <div style="margin-top:25px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                     <label>Start Time</label>
                    <input type="time" name="stime" class="form-control" autocomplete="off" placeholder="Select Start Time">
                     </div>

                     <div style="margin-top:25px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                     <label>End Time</label>
                        <input type="time" name="etime" class="form-control" autocomplete="off" placeholder="Select End Time">
                    </div>


                    <input style="margin-left: 600px; margin-top: 20px; margin-bottom: 30px; background:#65aca0; color:white;" type="submit" name="apply" value="Schedule" class="btn btn" >
                    
                </form>

                </div>
                            </div>
                            </div>
                            <div>
    
</body>
</html>
