
<!DOCTYPE html>
<html>
<head>
  <title>HMS Home page</title>
</head>
<body>
    <?php
    include("include/header.php");
    ?>

    <div style="margin-top: 50px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mx-1 shadow">
                    <img src="img/moreInfo.png" style="width: 100%; height:205px; ">

                    <h5 class="text-center">Click on the button to know more</h5>
                    <a href="#">
                        <button class="btn btn-success my-3 " style="margin-left: 38%; ">
                            More Info 
                        </button>
                    </a>

                </div>

                <div class="col-md-4 mx-1 shadow">
                    <img src="img/patient.jpg" style="width : 100%;">
                     <h5 class="text-center">We are here at your service join with us</h5>
                    <a href="patientreg.php">
                        <button class="btn btn-success my-3 " style="margin-left: 38%; ">
                            Register Now 
                        </button>
                    </a>
                </div>

                <div class="col-md-4 mx-1 shadow">
                    <img src="img/doc.jpg" style="width : 100%;">
                    <h5 class="text-center">We are employing Doctors</h5>
                    <a href="apply.php">
                        <button class="btn btn-success my-3 " style="margin-left: 38%; ">
                            Apply Now 
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>