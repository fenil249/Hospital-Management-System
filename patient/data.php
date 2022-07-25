<?php
include("../include/connection.php");
function loadAuthors(){

$res= "SELECT * FROM doctors GROUP BY specialization" ;
$result = mysqli_query($connect, $res);

while($row = mysqli_fetch_array($result)){
    $fname = $row['specialization'];
}

return $fname ;
}
?>