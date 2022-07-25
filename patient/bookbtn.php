<?php
session_start();
include("../include/connection.php");

if (isset($_GET['delete'])){
    $Super_User_ID = $_GET['delete'];
    $mysqli->query("DELETE FROM super_user where Super_User_ID='$Super_User_ID'") or die($mysqli->error());


 $_SESSION['message']="Record has been deleted!";
 $_SESSION['msg_type']="Danger";

  header("location: main-process55.php");

}