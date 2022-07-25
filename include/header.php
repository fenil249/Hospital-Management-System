    <!DOCTYPE html>
    <html>
    <head>
        <title> Header </title>

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    </head>
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-info " id="demo"  >
        <!-- <i class="fa-solid fa-plus-large"></i> -->
        <!-- <i class="fas fa-plus"></i> -->
            <h5 class="text-white" style="margin-left: 20px;"> Health Care <a href="#"><i class="fas fa-plus fa-1x"style="color:white;"></i></a>
    </h5>                                            
            <div class="mr-auto" style ="margin-left : 1050px"></div>
            <ul class="navbar-nav">
                <?php
                    if(isset($_SESSION['admin'])){
                        $user = $_SESSION['admin'];

                        echo '<li class="nav-item"><a href="#" class="nav-link text-white" style="margin-left:100px;">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                    }
                    else if(isset($_SESSION['patient'])){
                        $user = $_SESSION['patient'];

                        echo '<li class="nav-item"><a href="#" class="nav-link text-white" style="margin-left:100px;">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                    }else if(isset($_SESSION['doctor'])){
                        $user = $_SESSION['doctor'];

                    echo '<li class="nav-item"><a href="#" class="nav-link text-white" style="margin-left:100px;">'.$user.'</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                }
                    else{
                        echo '
                        <li class="nav-item"><a href="index.php" class="nav-link text-white"> Home </a></li>
                        <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white"> Admin </a></li>
                        <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white"> Doctor </a></li>
                        <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white"> Patient</a></li>';
                    }
                ?>
            </ul>
        </nav>

    </body>

    <style>

        #demo{
            background: #65aca0;
            position: -webkit-sticky; Safari
            position: sticky;
            /* top: 0;  */
        }
    </style>

    </html>