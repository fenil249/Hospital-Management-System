<?php


include("../include/connection.php");

$id=$_POST['id'];

$query="UPDATE book SET doctorstatus='Aprroved' WHERE id='$id'";
mysqli_query($connect,$query);


//  $query = "SELECT * from doctors WHERE id='$id'";
//  $res = mysqli_query($connect, $query);

//      while($row = mysqli_fetch_array($res)){
//          $profiles = $row['email'];
//          $fname = $row['firstname'];
//          $sname=   $row['surname'];
//      }


// $to_email =$profiles;
// $subject = "Application Approval";
// $body = "Congratulations $fname $sname , your Application has been approved.";
// $headers = "From:aabcxxyz1123@gmail.com";
// mail($to_email, $subject, $body, $headers);


?>