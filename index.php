<!DOCTYPE html>
<html>
<head>
  <title>HMS Home page</title>
</head>

<script>
    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

</script>

<body>
    <?php
    include("include/header.php");
    ?>

    <h1>Improving the lives of Our Patients and their families</h1>
    
    <div class="img-slider">
    </div>

    <div style="margin-top: 50px;"></div>
    <div class="container" style="margin-top:550px;">
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

<style>
    * {box-sizing:border-box}

    h1{
        font-size:2.1rem;
        line-height:1.4;
        letter-spacing:0.5rem;
        text-align:center;
        margin-top:50px;
    }

    .img-slider{
        width: 1000px;
        height: 400px;
        margin-top: 63px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background-image: url(img/index-bg-1.jpg);
        background-size: 100% 100%;
        animation: slider 9s infinite linear;
    }    

    @keyframes slider{
        0%{background-image: url(img/index-bg-2.jpg);}
        35%{background-image:url(img/index-bg-3.jpg);}
        /* 75%{background-image: url('https://5.imimg.com/data5/PU/MF/MY-56749576/dance-party-dj-500x500.jpg');} */
    }

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  /* animation:slider 9s infinite; */
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
</style>

</html>