<?php
session_start();
include("../include/header.php");
include("../include/connection.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    //$query = "SELECT * FROM book WHERE id='$id'";
    //$res = mysqli_query($connect, $query);
    //$row = mysqli_fetch_array($res);
    $query = "SELECT * from bill WHERE b_id='$id'";
    $res = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($res)){
    $p_id = $row['p_id'];
   // $d_id = $row['d_id'];
    $pname = $row['p_name'];
    $d_name=$row['d_name'];
    $a_date=$row['a_date'];
    $t_date=$row['t_date'];
    $dfees=$row['dfees'];
    $total=$row['total'];
    $mfees = $row['mfees'];
    }
}
if(isset($_POST['apply'])){

            $query= "UPDATE book SET payment='Aprroved' WHERE id='$id'";
            $result = mysqli_query($connect, $query);
            header("Location:billing.php");
  
    
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
                        include("psidenav.php");

                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            //$query = "SELECT * FROM book WHERE id='$id'";
                            //$res = mysqli_query($connect, $query);
                            //$row = mysqli_fetch_array($res);
                            $query = "SELECT * from bill WHERE b_id='$id'";
                            $res = mysqli_query($connect, $query);
                        
                            while($row = mysqli_fetch_array($res)){
                            $p_id = $row['p_id'];
                           // $d_id = $row['d_id'];
                            $pname = $row['p_name'];
                            $dname=$row['d_name'];
                            $a_date=$row['a_date'];
                            $t_date=$row['t_date'];
                            $dfees=$row['dfees'];
                            $total=$row['total'];
                            $mfees = $row['mfees'];
                            }
                        }
                    ?>
                </div> 
                </div>

                <div class="col-md-6 my-3 jumbotron" style="margin-right:350px">
                
        
                

                <div class="container">
        <div class="title">Pay  Bill </div>
            
        <form  method="post">
        
            <div class="user-details">
                
                <div class="input-box">
                    <span class="details">Patient Id</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $p_id ?>" required>
                </div>
                
                <div class="input-box">
                    <span class="details">Patient Name</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $pname ?>" required>
                </div>

                <div class="input-box">
                    <span class="details">Appointment Date</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $a_date ?>" required>
                </div>

                <div class="input-box">
                    <span class="details">Bill Date</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $t_date ?>" required>
                </div>

                <div class="input-box">
                    <span class="details">Doctor Name</span>
                    <input type="text" name="eventname" id="eventname" disabled placeholder="<?php echo $dname;?>" required>
                </div>

                <div class="input-box">
                    <span class="details">Doctor Fees</span>
                    <input onblur="findTotal()" type="number" name="dfees"  id="fees1" disabled placeholder="<?php echo $dfees ?>" required>
                </div>

                <div class="input-box">
                    <span class="details">Medical Fees</span>
                    <input  onblur="findTotal()" type="number" name="mfees" id="fees2" disabled placeholder="<?php echo $mfees ?>" r >
                </div>

                <div class="input-box">
                    <span class="details">Total amount </span>
                    <input type="number" name="total" id="total" disabled placeholder="<?php echo $total ?>" required>
                </div>
    

            </div>

            <div class="btn-1">
                <!-- <input type="submit" value="Register"> -->
                
                <input style="margin-left: 00px; margin-top: 10px; margin-bottom: 30px;" type="submit" name="apply" value="Pay Bill" class="btn btn-success">

            </div>

        </form>
    </div>

                </div>
            </div>
        </div>
    </div>
</body>



<style>
   

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
    }

    form .btn-1 input{
        height: 50px;
        width: 630px;
        color: #fff;
        background: #0Df;
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
