<?php


include("../include/connection.php");

$id=$_POST['id'];

$query="DELETE FROM token WHERE t_id='$id'";
mysqli_query($connect,$query);

?>