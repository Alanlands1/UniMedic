<?php
  include "connect.php";
?>
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
		    		<a class="navbar-brand" href="index.html">Uni<span>Medic</span></a>
	    		</div>
		    </div>
		  </div>
    </nav>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-p="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item navEffects"><a href="labPortal.php" class="nav-link">Upload Report</a></li?
	        </ul>
	      </div>
	    </div>
	  </nav>
    <?php
        session_start();
        $labname=$_SESSION['hosp'];
        $pass= $_SESSION['pass'];
        $query = "SELECT * FROM lab WHERE name = '$labname'";
        $retval=mysqli_query($connect,$query);
          $row = mysqli_fetch_assoc($retval);
        if ($row['hospid'] == 0) {
    ?>
    <!-- Add User -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4" >
          <div class="form">
            <form class="" action="labPortal.php" method="post">
              <input type="number" name="portalFn" value="2" style="display:none;">
              <div class="heading-section">
                <h2 class="">Upload Report</h2>
              </div>
              <div class="form-group py-5">
                <input class="form-control mb-4 box_style1" type="text" name="pid"  placeholder="patientId">
                <input class="form-control mb-4 box_style1" type="text" name="hid"  placeholder="Hospitalid">
                <input class="form-control mb-4 box_style1" type="Date" name="pdate"  placeholder="Date">
                <input class="form-control mb-4 box_style1" type="text" name="pdec"  placeholder="Description">
                <input class="form-control mb-4 box_style1" type="text" name="pdec"  placeholder="Status">
                <input class="form-control mb-4 box_style1" type="submit" name="Submit" value="Submit">
                  <?php
                  ?>

              </div>
            </form>

          </div>
        </div>
        <div class="col-lg-4">
          <div class="heading-section">
            <h2 class="">Hospital's List</h2>
            <table class="cusTable">
              <tr>
                <th>ID</th>
                <th>Hospital Name</th>
              </tr>
              <?php
              $id =$_SESSION['hosid'];
                $query = "SELECT * FROM hospital ";
                $retval=mysqli_query($connect,$query);
                while ($row = mysqli_fetch_assoc($retval)) {
                  ?>
                  <tr>
                    <td><?php echo $row['id'];?> </td>
                    <td><?php echo $row['name'];?></td>
                  </tr><?php
                }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
      <?php
    }
    else {
      $hospitalid=$_SESSION['hospid'];
      ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">

          </div>
          <div class="col-lg-4" >
            <div class="form">
              <form class="" action="labPortal.php" method="post">
                <input type="number" name="portalFn" value="2" style="display:none;">
                <div class="heading-section">
                  <h2 class="">Upload Report</h2>
                </div>
                <div class="form-group py-5">
                    <input class="form-control mb-4 box_style1" type="text" name="pid"  placeholder="patientId">
                    <input class="form-control mb-4 box_style1" type="Date" name="pdate"  placeholder="Date">
                    <input class="form-control mb-4 box_style1" type="text" name="pdec"  placeholder="Description">
                    <input class="form-control mb-4 box_style1" type="text" name="pstatus"  placeholder="Status">
                    <input class="form-control mb-4 box_style1" type="submit" name="submit" value="Submit">

                </div>
              </form>

            </div>
          </div>
          <div class="col-lg-4">

          </div>
        </div>
      </div>
      <?php
    } ?>


             <div class="col-lg-4">
             </div>

        <?php
        if (isset($_POST['submit'])) {
          $pid=$_POST['pid'];
          if ($hospitalid==0) {
            $hospitalid= $_POST['hid'];
          }
          $dated = $_POST['pdate'];
          $state = $_POST['pstatus'];
          $pdec = $_POST['pdec'];
          $query = "INSERT into labtest(psid,hospitalid,dated,descp,status) values($pid,$hospitalid,'$dated','$pdec','$state')";
          $retval=mysqli_query($connect,$query);
          echo "<script>alert('Registered')</script>";

        }

  ?>
    </body>
