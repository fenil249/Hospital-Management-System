<?php
session_start();
include("../include/header.php");
include("../include/connection.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    //$query = "SELECT * FROM book WHERE id='$id'";
    //$res = mysqli_query($connect, $query);
    //$row = mysqli_fetch_array($res);
    $query = "SELECT * from scheduleslot WHERE id='$id'";
    $res = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($res)){
    //$p_id = $row['p_id'];
    $dname = $row['doctor'];
    $date=$row['date'];
    $stime = $row['stime'];
    $etime=$row['etime'];
    }
}

// $ad = $_SESSION['patient'];
//     $query = "SELECT * from patient WHERE username='$ad'";
//     $res = mysqli_query($connect, $query);
    
//     while($row = mysqli_fetch_array($res)){
//      $fname = $row['firstname'];
//      $p_id = $row['id'];
//}
if(isset($_POST['apply'])){
    
    $pid = $_POST['pid'];


    $query = "SELECT * from scheduleslot WHERE id='$id'";
    $res = mysqli_query($connect, $query);
        
    while($row = mysqli_fetch_array($res)){
         $spe = $row['specialization'];
         $doctor = $row['doctor'];
         $date=$row['date'];
         $stime=$row['stime'];
         $etime=$row['etime'];
     }

     $query = "SELECT * from patient WHERE id='$pid'";
     $res = mysqli_query($connect, $query);
     
     while($row = mysqli_fetch_array($res)){
      $fname = $row['firstname'];
      //$p_id = $row['id'];
     }

     $query = "SELECT * from doctors WHERE firstname='$doctor' and specialization='$spe' ";
      $res = mysqli_query($connect, $query);
    
     while($row = mysqli_fetch_array($res)){
     //$fname = $row['firstname'];
     $d_id = $row['id'];
     }

     $query = "INSERT INTO book(p_id,pname,d_id,dname,specialization,date,stime,etime,adminstatus,doctorstatus,payment,bill) VALUES ('$pid','$fname','$d_id','$doctor','$spe','$date','$stime','$etime','Aprroved','Pending','Pending','Pending') ";
      $res = mysqli_query($connect, $query);

    //   $query="UPDATE book SET adminstatus='Aprroved' WHERE id='$id'";
    //   mysqli_query($connect,$query);

// $query2 ="SELECT * from book WHERE id='$id'";
// $res=mysqli_query($connect, $query2);
// while($row = mysqli_fetch_array($res)){
//         $pid=$row['p_id'];
//         $date = $row['date'];
//         $pname=$row['pname'];
//         $stime=$row['stime'];
//         $etime=$row['etime'];
//         $did=$row['d_id'];
//         $dname=$row['dname'];
//      }

     $query3="SELECT * from patient WHERE id='$pid'";
     $res=mysqli_query($connect,$query3);
     while($row = mysqli_fetch_array($res)){
        $email=$row['email'];
        
     }

     $query4="INSERT INTO token (p_id,d_id,p_name,d_name,p_email,date,s_time,e_time) VALUES ('$pid','$d_id','$fname','$dname','$email','$date','$stime','$etime') ";
     mysqli_query($connect,$query4);

    $query5="SELECT * from token where date='$date'";
    $token=mysqli_query($connect,$query5);
    $pp = mysqli_num_rows($token);

    $query6="UPDATE token SET  t_no='$pp' WHERE p_id='$pid' and d_id='$d_id' ";
     mysqli_query($connect,$query6);


     $query7 ="SELECT * from ecase WHERE pid='$pid'";
     $res=mysqli_query($connect, $query7);
     


     if(mysqli_num_rows($res)!=0)
     {

      while($row = mysqli_fetch_array($res)){
         $edate=$row['date'];
      }
      //$ecase='CASE_'.$id;
      $date1=strtotime($edate);
      $date2=strtotime($date);
      $newdate=round(($date2-$date1)/86400);
      if(($newdate)>90)
      {
         $ecase='CASE_'.$id;
         $query6="UPDATE ecase SET caseid='$ecase',date='$date',bid='$id' WHERE pid='$pid'";
         mysqli_query($connect,$query6);
      }


     }
     else
     {
      
      $ecase='CASE_'.$id;
      $query8 ="INSERT INTO ecase(pid,bid,date,caseid) VALUES  ('$pid','$id','$date','$ecase')";
      $res=mysqli_query($connect, $query8);

      }


$to_email =$email;
$subject = "Appointment Confirmation";
$body = " $pname , your appointment has been booked with token no. $pp on $date";
$headers = "From:aabcxxyz1123@gmail.com";
mail($to_email, $subject, $body, $headers);


     
    header("location: instbooking.php");
    

}




?>


<!DOCTYPE html>
<html>
<head>
    <title>Apply Now!!</title>
</head>
<body style="background-image: url(img/bg.jfif); background-size: cover; background-repeat:no-repeat;">


    <div class="container-fluid">
        
        <div class="col-md-12" style="color: black;">
            <div class="row">
            
                <div class="col-md-2">

                <div  style="margin-left:-30px;"> 
                    <?php
                        include("sidenav.php");

                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            //$query = "SELECT * FROM book WHERE id='$id'";
                            //$res = mysqli_query($connect, $query);
                            //$row = mysqli_fetch_array($res);
                            $query = "SELECT * from scheduleslot WHERE id='$id'";
                            $res = mysqli_query($connect, $query);
                        
                            while($row = mysqli_fetch_array($res)){
                            //$p_id = $row['p_id'];
                            $dname = $row['doctor'];
                            $date=$row['date'];
                            $stime = $row['stime'];
                            $etime=$row['etime'];
    
                            }
                        }
                    ?>
                </div> 
                </div>

                <div class="col-md-6 my-3 jumbotron" style="margin-right:350px">
                
        
                

                <div class="container">
        <div class="title">Appointment</div>
            
        <form  method="post">
        
            <div class="user-details">
                
                <div class="input-box">
                    <span class="details">Patient Id</span>
                    <input type="text" name="pid" id="eventname" placeholder="Enter Patient ID" required>
                </div>
                
                <!-- <div class="input-box">
                    <span class="details">Patient Name</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $fname ?>" required>
                </div> -->

                <div class="input-box">
                    <span class="details">Appointment Date</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $date ?>" required>
                </div>

                

                <div class="input-box">
                    <span class="details">Doctor Name</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $dname;?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Start Time</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $stime;?>" required>
                </div>

                <div class="input-box">
                    <span class="details">End Time</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $etime;?>" required>
                </div>

               

                
    

            </div>

            <div class="btn-1">
                <!-- <input type="submit" value="Register"> -->
                
                <input style="margin-left: 00px; margin-top: 10px; margin-bottom: 30px;" type="submit" name="apply" value="Book Appointment" class="btn btn-success">

            </div>

        </form>
    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByName('fees');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
}

</script> -->
<script type="text/javascript">
function findTotal(){
     arr1 = document.getElementById('fees1');
     arr2 = document.getElementById('fees2');
    var tot=0;
    if(parseInt(arr1.value))
     tot += parseInt(arr1.value);

     if(parseInt(arr2.value))
     tot += parseInt(arr2.value);

    document.getElementById('total').value = tot;
}

</script>
<style>
    /* .jumbotron {
    background-color: #E0E0E0;
    color: white;
    margin: auto;
    width: 50%;
    } */

    .container{
        margin-left:280px;
        margin-top:10px;
        max-width: 700px;
        width: 100%;
        background: #fff;
        padding: 25px 35px;
        border-radius: 15px;
        border:2px solid black;
    }

    .container .title{
        font-size: 30px;
        text-align: center;
        font-weight: 500;
        /* position: relative; */
    }

    .container form .user-details{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 12px 0 12px 0;
    }

    form .user-details .input-box {
        width: calc(100%/2 - 20px);
        margin-bottom: 15px;
    }

    form .user-details .input-box .details{
        font-weight: 500;
        margin-bottom: 10px;
        display: block;
    }

    form .user-details .input-box input{
        height: 45px;
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 15px;
        border-bottom-width: 2px;
    }

    form .user-details .input-box textarea{
        outline: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 15px;
        padding-top: 5px;
        font-size: 15px;
        border-bottom-width: 2px;
    }

    form btn-1{
        align-items: center;
        justify-content: center;
        background-color:#65aca0;
    }

    form .btn-1 input{
        height: 50px;
        width: 630px;
        color: #fff;
        background: #65aca0;
        font-weight: 700;
        font-size: 18px;
        border-radius: 5px;
        letter-spacing: 2px;
        /* background: linear-gradient(135deg, #FFFFE0, #B22222); */
        border: none;
    }

    form .btn-1 input:hover{
        opacity: 0.7;
        cursor: pointer;
    }
</style>

</html>
