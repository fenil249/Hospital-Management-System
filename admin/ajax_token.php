<?php
include("../include/connection.php");
//session_start();
//$pid;

//$date2 = date('Y/m/d');
$dummy=date("Y/m/d");
//$dummy2=5;
//$dummy=date('Y-m-d', strtotime(' +1 day'));
//$today = time();
//$dummy=date('Y-m-d',strtotime($today)+43200);

//echo '<script>alert("$dummy")</script>';
//echo '<script type="text/javascript"> alert('.$.')</script>';
$query="SELECT * FROM token WHERE date='$dummy'";
$res=mysqli_query($connect,$query);



$query1="SELECT * FROM token WHERE date='$dummy'";
$res1=mysqli_query($connect,$query1);


if(mysqli_num_rows($res1)>=1){

    while($row1=mysqli_fetch_array($res1))
    {
        $pid=$row1['p_id'];
    }
  
  
    $query2="SELECT * FROM ecase WHERE pid= '$pid'";
    $res2=mysqli_query($connect,$query2);
    
    while($row2=mysqli_fetch_array($res2))
    {
        $caseid=$row2['caseid'];
    }
}




$output="";

$output.="

        <table class='table table-bordered text-center'>
        <tr>
        <th>Token Number</th>
        <th>Case ID</th>
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

    $ppid=$row['p_id'];
    $query5="SELECT * FROM ecase WHERE pid= '$ppid'";
    $res5=mysqli_query($connect,$query5);
    
    while($row5=mysqli_fetch_array($res5))
    {
        $caseid=$row5['caseid'];
    }

  $output .="
   <tr>
   <td>".$row['t_id']."</td>
   <td>$caseid</td>
   <td>".$row['p_id']."</td>
   <td>".$row['p_name']."</td>
   <td>".$row['d_name']."</td>
   <td>".$row['date']."</td>
   <td>".$row['s_time']."</td>
   <td>".$row['e_time']."</td>
      <td>
      <button id='".$row['t_id']."'  class='btn btn-danger reject'>Remove</button>
      
   </td>
  ";

}
$output.="
 
  </tr>
  </table>

";
echo $output;
?>