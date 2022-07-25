<?php



$query="UPDATE book SET adminstatus='Aprroved' WHERE id='$id'";
mysqli_query($connect,$query);

$query2 ="SELECT * from book WHERE id='$id'";
$res=mysqli_query($connect, $query2);
while($row = mysqli_fetch_array($res)){
        $pid=$row['p_id'];
        $date = $row['date'];
        $pname=$row['pname'];
        $stime=$row['stime'];
        $etime=$row['etime'];
        $did=$row['d_id'];
        $dname=$row['dname'];
     }

     $query3="SELECT * from patient WHERE id='$pid'";
     $res=mysqli_query($connect,$query3);
     while($row = mysqli_fetch_array($res)){
        $email=$row['email'];
        
     }

     $query4="INSERT INTO token (p_id,d_id,p_name,d_name,p_email,date,s_time,e_time) VALUES ('$pid','$did','$pname','$dname','$email','$date','$stime','$etime') ";
     mysqli_query($connect,$query4);

    $query5="SELECT * from token where date='$date'";
    $token=mysqli_query($connect,$query5);
    $pp = mysqli_num_rows($token);

    $query6="UPDATE token SET  t_no='$pp' WHERE p_id='$pid' and d_id='$did' ";
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
$body = " $fname , your appointment has been booked with token no. $pp on $date";
$headers = "From:aabcxxyz1123@gmail.com";
mail($to_email, $subject, $body, $headers);

?>