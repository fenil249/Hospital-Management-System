<?php
include("../include/connection.php");
//session_start();
$query="SELECT * FROM token";
$res=mysqli_query($connect,$query);



$output="";

$output.="

        <table class='table table-bordered text-center'>
        <tr>
        <th>Token Number</th>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Doctor Name</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>

        </tr>

";

if(mysqli_num_rows($res)<1){

    $output.="
    <tr>
    <td colspan='10' class='text-center'>No Appointment Booked Yet.</td>
    </tr>

    ";
}
while($row=mysqli_fetch_array($res)){
  $output .="
   <tr>
   <td>".$row['t_id']."</td>
   <td>".$row['p_id']."</td>
   <td>".$row['p_name']."</td>
   <td>".$row['d_name']."</td>
   <td>".$row['date']."</td>
   <td>".$row['s_time']."</td>
   <td>".$row['e_time']."</td>
      <td>

      <div class='col-md-12'>
        <div class='row'>

                <div class='col-md-6'>
                <button id='".$row['t_id']."'  class='btn btn-danger reject'>Remove</button>
                </div>
           </div>   
         </div>
   </td>
  ";

}
$output.="
 
  </tr>
  </table>

";
echo $output;
?>