<?php
session_start();
include("../include/connection.php");




  if (isset($_GET['id'])){
    $id = $_GET['id'];

    $ad = $_SESSION['patient'];
    $query = "SELECT * from patient WHERE username='$ad'";
    $res = mysqli_query($connect, $query);
    
    while($row = mysqli_fetch_array($res)){
     $fname = $row['firstname'];
     $p_id = $row['id'];
    }


    $query = "SELECT * from scheduleslot WHERE id='$id'";
    $res = mysqli_query($connect, $query);
        
    while($row = mysqli_fetch_array($res)){
         $spe = $row['specialization'];
         $doctor = $row['doctor'];
         $date=$row['date'];
         $stime=$row['stime'];
         $etime=$row['etime'];
     }

     $query = "SELECT * from doctors WHERE firstname='$doctor' and specialization='$spe' ";
      $res = mysqli_query($connect, $query);
    
     while($row = mysqli_fetch_array($res)){
     //$fname = $row['firstname'];
     $d_id = $row['id'];
     }

     $query = "INSERT INTO book(p_id,pname,d_id,dname,specialization,date,stime,etime,adminstatus,doctorstatus,payment,bill) VALUES ('$p_id','$fname','$d_id','$doctor','$spe','$date','$stime','$etime','Pending','Pending','Pending','Pending') ";
      $res = mysqli_query($connect, $query);

     
    header("location: book2.php");
    

}
