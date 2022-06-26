<?php
include("../include/connection.php");

$output ='';

$sql=" SELECT firstname FROM doctors WHERE specialization='".$_POST['ID']."' ";

$result=mysqli_query($connect,$sql) ;
$output.='<option value="">-Select Language-</option>';

while($row=mysqli_fetch_array($result)){
$output.='<option value ="'.$row[0].'">'.$row[0].'</option>';
}
echo $output ;
? >