<?php


include("../include/connection.php");

$id=$_POST['id'];

$query="DELETE FROM scheduleslot WHERE id='$id'";
mysqli_query($connect,$query);

?>