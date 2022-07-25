<?php
include("../include/connection.php");
//session_start();
$query="SELECT *FROM scheduleslot";
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
        <th>Action</th>

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
   <td>".$row['doctor']."</td>
   <td>".$row['specialization']."</td>
   <td>".$row['date']."</td>
   <td>".$row['stime']."</td>
   <td>".$row['etime']."</td>
      <td >
      <button id='".$row['id']."'  class='btn btn-danger reject'>Remove</button>
       </td>
  ";

}
$output.="
 
  </tr>
  </table>

";
echo $output;
?>