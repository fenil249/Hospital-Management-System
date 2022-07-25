<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
 <title>Appointment Request</title>
</head>
<body>

<?php
include("../include/header.php");
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left:-30px;">
                <?php
                include("psidenav.php");
                ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my">Appointment Request</h5>

                <div id="show"></div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
     $(document).ready(function(){
        
        show();
        function show(){
            $.ajax({
              url:"pajax_book_request.php",
              method:"POST",
              success:function(data){
                $("#show").html(data);
              } 
            });
        }

    
        
     });
</script>
    
</body>
</html>