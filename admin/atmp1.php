<?php
include("include/connection.php");

if(isset($_POST['s_id'])){
    $s_id = $_POST['s_id'];
    $sql = mysqli_query($connect,"select * from doctors where s_id='$s_id' ");
    ?>
    <select name="doctor" class="form-control">
        <option value="">Select Doctor</option>
        <?php
        while($row = mysqli_fetch_array($sql)){
            ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['firstname'];?></option>
            <?php
        }
        ?>
    </select>
    <?php
}


?>