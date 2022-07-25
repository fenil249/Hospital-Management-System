<?php
session_start();
include("../include/connection.php");

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


// $ad = $_SESSION['patient'];
//     $query = "SELECT * from patient WHERE username='$ad'";
//     $res = mysqli_query($connect, $query);
    
//     while($row = mysqli_fetch_array($res)){
//      $fname = $row['firstname'];
//      $p_id = $row['id'];
//     }
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
                    <h2 style="margin-left:520px; margin-top:30px;">Book Appointment</h2>
                   
                <section>
              
            <form method="post" action="instbooking.php">

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
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
                        <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label >Doctor :</label>
                        <select name="doctor" class="doctor form-control" id="doctor">
                            <option selected="selected" value="">Select Doctor</option>
                        </select>
                        
                      </div>
                      

                    <input style="margin-left: 550px; margin-top: 40px; margin-bottom: 30px;" type="submit" name="apply" value="Available Slot" class="btn btn-success">
                    
                </form>
                </section>
                <?php
                  $spe='';
                  $doctor='';    
        
                if (isset($_POST['apply'])){



                    $spe1 = $_POST['spe'];
                    $doctor1 = $_POST['doctor'];

                    $error = array();

                    if($spe1 == ""){
                    $error['apply'] = "Select Specialization";
                    }
                    else if($doctor1 == ""){
                    $error['apply'] = "Select Doctor";
                    }
                   
                    
   
   
              if(count($error) == 0){
        
      
          // echo "<script>alert('You have Successfully Applied')</script>";
           //header("Location:book2.php");
           $query1= "SELECT firstname FROM doctors WHERE id='$doctor1'";
           $result1 = mysqli_query($connect, $query1);



           while($row1 = mysqli_fetch_array($result1)){
           $dname = $row1['firstname'];
           }

           $query2= "SELECT * FROM specialization WHERE s_id='$spe1'";
           $result2 = mysqli_query($connect, $query2);

           while($row2 = mysqli_fetch_array($result2)){
           $sname = $row2['spe'];
           }


            $spe = $sname;
            $doctor=$dname;



       
          }
              
                  
                    
               
       }
                
                $query = "SELECT * FROM scheduleslot WHERE doctor='$doctor' and specialization='$spe' ";
                $result = mysqli_query($connect, $query);
                

                ?>
                <div class="justify-content-center">
                <table class='table table-bordered'>
                <thead>

                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>

                </thead>
            <?php
                while ($row = $result->fetch_assoc()): 
            ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['stime']; ?></td>
                        <td><?php echo $row['etime']; ?></td>
                        <td>
                                        
                                        
                                        <a href='ajax_instbooking.php?id=<?php echo $row['id']; ?>'>
                                            <button class='btn btn-success' name='book'>Book</button>
                                        </a>

                                      
                                       
                        </td>
                        
                    </tr>
                    <?php endwhile; ?>
                </table>
    </div>
  
                 <?php
                function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
                }
                ?> 



                </div>
            </div>
       </div>
     <div>
    
</body>
</html>