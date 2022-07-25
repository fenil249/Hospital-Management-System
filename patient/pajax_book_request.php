<?php
include("../include/connection.php");
session_start();

    $ad = $_SESSION['patient'];
    $query = "SELECT * from patient WHERE username='$ad' ";
    $res = mysqli_query($connect, $query);
    
    while($row = mysqli_fetch_array($res)){
       $p_id= $row['id'];
    }

    $query="SELECT * FROM book WHERE p_id='$p_id' ORDER BY date ";
    $res=mysqli_query($connect,$query);



$output="";

$output.="

        <table class='table table-bordered text-center'>
        <tr>
        <th>ID</th>
        <th>Doctor Name</th>
        <th>Specialization</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Status</th>

        </tr>

";

if(mysqli_num_rows($res)<1){

    $output.="
    <tr>
    <td colspan='10' class='text-center'>No Appointment Request Yet.</td>
    </tr>

    ";
}
while($row=mysqli_fetch_array($res)){
  $output .="
   <tr>
   <td>".$row['id']."</td>
   <td>".$row['dname']."</td>
   <td>".$row['specialization']."</td>
   <td>".$row['date']."</td>
   <td>".$row['stime']."</td>
   <td>".$row['etime']."</td>
   <td>".$row['adminstatus']."</td>

  ";

}
$output.="
 
  </tr>
  </table>

";
echo $output;
?>