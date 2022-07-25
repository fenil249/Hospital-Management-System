<?php
session_start();
include("include/header.php");
include("include/connection.php");
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
                    url:"tmp1.php",
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
        <div class="container">
            <div class="row">
                
            <form method="post">
                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>First name</label>
                        <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter First name" value="<?php  if(isset($_POST['fname'])) echo $_POST['fname'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Surname</label>
                        <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php  if(isset($_POST['sname'])) echo $_POST['sname'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php  if(isset($_POST['uname'])) echo $_POST['uname'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php  if(isset($_POST['email'])) echo $_POST['email'];?>">
                    </div>
                    
                    

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php  if(isset($_POST['phone'])) echo $_POST['phone'];?>">
                    </div>

                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label >Country :</label>
                        <select name="spe" class="spe form-control">
                            <option selected="selected">Select Specialization</option>
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
                        <select name="doctor" class="doctor form-control">
                            <option selected="selected">Select Doctor</option>
                        </select>
                        
                      </div>


                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                    </div>


                    <div style="margin-top:30px; margin-right:30px; margin-left:30px; color: black;" class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                    </div>
                    
                    <input style="margin-left: 300px; margin-top: 10px; margin-bottom: 30px;" type="submit" name="apply" value="Book Now" class="btn btn-success">

                    













                </form>

            </div>
        </div>
    
</body>
</html>
