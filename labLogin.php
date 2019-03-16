<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UniMedic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customstyle.css">
  </head>
  <body>
    <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
          <div class="col-lg-2 pr-4 align-items-center">
		    		<a class="navbar-brand" href="index.html"><img src="images/logo.png" class="navlogo">&nbsp Uni<span>Medic</span></a>
	    		</div>
		    </div>
		  </div>
    </nav>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active navEffects"><a href="index.html" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item navEffects"><a href="doctorlogin.php" class="nav-link">Doctor Portal</a></li>
	        	<li class="nav-item navEffects"><a href="hospitallogin.php" class="nav-link">Hospital Portal</a></li>
	        	<li class="nav-item navEffects"><a href="labLogin.php" class="nav-link">Lab Portal</a></li>
	          <li class="nav-item navEffects"><a href="About.html" class="nav-link">About</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Login</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 py-5 pr-md-5">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	          	<span class="subheading">Register</span>
	            <h2 class="mb-4">Register your Lab</h2>
	            <p>Enter the lab details</p>
	          </div>
	          <form action="labLogin.php" method="post" enctype="multipart/form-data" class="appointment-form ftco-animate">
	    				<div >
		    				<div class="form-group">
		    					<input type="text" class="form-control" name="reghospital" placeholder="Lab Name">
		    				</div>
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="City" name="regcity">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		    					<input type="text" class="form-control" name="regstate" value="" placeholder="State">
		    				</div>
	    					<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" name="regphone" placeholder="Phone">
		    				</div>
	    				</div>
              <div class="form-group">
                <input type="text" class="form-control" name="reghos" placeholder="Hospitalid(if necessary)">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="regpassword" placeholder="Password">
              </div>
	    				<div class="d-md-flex">
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Register" name="register" class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
    			</div>
          <div class="col-md-6 py-5 pr-md-5">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	          	<span class="subheading">Login</span>
	            <h2 class="mb-4">Login to Lab</h2>
	            <p>Already registered, then login to continue</p>
	          </div>
	          <form action="labLogin.php" method="post" enctype="multipart/form-data" class="appointment-form ftco-animate">
	    				<div>
		    				<div class="form-group">
		    					<input type="text" class="form-control" name="hospital" placeholder="Lab Name">
		    				</div>
		    				<div class="form-group">
		    					<input type="password" class="form-control" name="password" placeholder="Password">
		    				</div>
	    				</div>
		            <div class="form-group ml-md-12 centered" style="width:30%;">
		              <input type="submit" name="login" value="Login" class="btn btn-secondary py-3 px-9 btn-login">
		            </div>
	    				</div>
	    			</form>
    			</div>
        </div>
    	</div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2 logo">Uni<span>Medic</span></h2>
              <p>Unified Medical Database</p>
            </div>
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">Vardev Solutions</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@vardevsolutions.com</span></a></li>
                </ul>
              </div>

              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
      </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>ipt>
  <script src="js/main.js"></script>

  </body>
</html>
<?php
session_start();
require('connect.php');
if (isset($_POST['register'])) {
    function validatenumber($string) {
       return preg_replace('/[^0-9]/', '', $string);
    }

    function validate($string) {
       return preg_replace('/[^A-Z@ a-z0-9+\- .]/', '', $string);
    }
    $name= validate($_POST['reghospital']);
    $password=md5($_POST['regpassword']);
    $regcity=validate($_POST['regcity']);
    $regstate=validate($_POST['regstate']);
    $regnumber=validatenumber($_POST['regphone']);
    $reghos=validatenumber($_POST['reghos']);
    if ($reghos == "" || $reghos == 0 ) {
      $reghos = 0;
    }
    $query = "SELECT * FROM lab WHERE name = '$name'";
    $retval=mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($retval);
    if ($name == "" || $password == "" || $regcity=="" || $regstate=="" || $regnumber=="") {
      // code...
      echo "<script>alert('Fields required..');</script>";
      die();

    }
    if ($row['id']=="") {
        $query = "INSERT into lab(name,password,city,state,phone,hospid) values('$name','$password','$regcity','$regstate','$regnumber',$reghos)";
        $retval=mysqli_query($connect,$query);
        if (!$retval) {
          // code...
          echo "<script>alert('not Registered');</script>";
        }
        else
          echo "<script>alert('Lab Registered');</script>";
    }
    else {
      echo "<script>alert('Already Registered Lab');</script>";
    }
  }
if (isset($_POST['login'])) {

    function validatenumber($string) {
       return preg_replace('/[^0-9]/', '', $string);
    }

    function validate($string) {
       return preg_replace('/[^A-Z@ a-z0-9\- .]/', '', $string);
    }
    $name= validate($_POST['hospital']);
    $password= md5($_POST['password']);
    $query = "SELECT * FROM lab WHERE name = '$name'";
    $retval=mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($retval);
    if($row['password'] == $password){
      echo "<script>alert('Logined')</script>";
      $id=$row['id'];
      $_SESSION['hosp']=$name;
      $_SESSION['pass']=$_POST['password'];
      header('location:labPortal.php');
    }else {
      echo "<script>alert('Wrong Username or Password')</script>";
    }
  }
 ?>