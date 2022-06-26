<?php
include("../include/connection.php");
session_start();

    $ad = $_SESSION['doctor'];
    $query = "SELECT * from doctors WHERE username='$ad'";
    $res = mysqli_query($connect, $query);
    
    while($row = mysqli_fetch_array($res)){
       $d_id= $row['id'];
    }

    $query="SELECT * FROM book WHERE adminstatus='Aprroved' and doctorstatus='Pending' and d_id='$d_id' ";
    $res=mysqli_query($connect,$query);



$output="";

$output.="

        <table class='table table-bordered text-center'>
        <tr>
        <th>ID</th>
        <th>Patient Name</th>
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
   <td>".$row['pname']."</td>
   <td>".$row['dname']."</td>
   <td>".$row['specialization']."</td>
   <td>".$row['date']."</td>
   <td>".$row['stime']."</td>
   <td>".$row['etime']."</td>
      <td>

      <div class='col-md-12'>
        <div class='row'>
                <div class='col-md-6'>
                 <button id='".$row['id']."'  class='btn btn-success approve'>Treat</button>
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