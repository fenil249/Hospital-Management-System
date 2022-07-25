<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>


<?php
    include("../include/header.php");
              
?>
    
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2"  style="margin-left:-30px;">
                 <?php
                 include("sidenav.php");
                 include("../include/connection.php");
                 
                 ?>
                </div>
       
       
               <div class="col-md-10">
                   <div class="col-md-12">
                        <div class="row"> 
                            <div class="col-md-6">
                            <h5 class="text-center">All Admin</h5>

                            <?php
                                $ad=$_SESSION['admin'];
                                $query="SELECT * FROM admin WHERE username !='$ad'";
                                $res=mysqli_query($connect,$query);

                                    $output="
                                    
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th style='width:10%;' >Action</th>
                                    <tr>
    

                                    ";
                                if(mysqli_num_rows($res)<1){
                                    $output.="<tr><td  colspan='3' class='text-center'>No New Admin</td></tr>";
                                }
                                while($row=mysqli_fetch_array($res)){
                                        $id=$row['id'];
                                        $username=$row['username'];
                                        $output .="
                                            <tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td>
                                          
                                            <a href='admin.php?id=$id' ><button id='$id' class='btn btn-danger remove'>Remove</button> </a>
                                            
                                            </td>
                                        ";
                                }
                                $output .="
                                </tr>
                                </table>
                                ";

                                echo $output;

                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];

                                    $query="DELETE FROM admin WHERE id = '$id'";
                                    mysqli_query($connect,$query);
                                }

                            ?>
                           
                                
                          

                            </div>
                            <div class="col-md-6">

                          
                            <?php
                                // include("../include/connection.php");

                            if(isset($_POST['add'])){
                        
                                $username = $_POST['uname'];
                                $password = $_POST['pass'];
                                $image=$_FILES['img']['name'];

                                $error = array();

                                $query1 = "SELECT * FROM admin WHERE username='$username' ";
                                $result1 = mysqli_query($connect, $query1);

                                if(empty($username)){
                                    $error['admin'] = "Enter Username";
                                }
                                else if(empty($password)){
                                    $error['admin'] = "Enter Password";
                                }
                                else if(empty($image)){
                                    $error['admin'] = "Enter Picture";
                                }else if(mysqli_num_rows($result1) != 0){
                                    $error['admin'] ="Username already exist";
                                }
                              
                                if(count($error) == 0){
                                    $query = "INSERT INTO  admin (username,password,profile) VALUES('$username','$password','$image')";
                                    $result = mysqli_query($connect, $query);

                                    if($result){
                                        move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                    }
                                    else{
                                    }

                                   
                                }
                            }

                            if(isset($error['admin'])){
                                $er=$error['admin'];

                                $show= "<h6 class='text-center alert alert-danger'>$er</h6>";

                            }else{
                                $show="";
                            }

                            ?>



                            <h5 class="text-center">Add Admin</h5>


                            <form method="post" enctype="multipart/form-data">
                                    
                                   <div>
                                    <?php  echo $show; ?> 
                                    </div>
                                    <div class="from-group">
                                        <label>Username</label>
                                        <input type="text"name="uname"class="form-control"
                                        autocomplete="off">
                                    </div>

                                    <div class="from-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>

                                    <div class="from-group">
                                        <label>Add Admin Picture</label>
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    <input type="submit" name="add" value="Add New Admin" class="btn btn" style="background:#65aca0; color:white;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>

</body>
</html>