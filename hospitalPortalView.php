<?php
session_start();
require('connect.php');
if ($_SESSION['hosid']=="") {
  header('location:hospitallogin.php');
}
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
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item navEffects"><a href="hospitalPortalView.php?portalFn=1" class="nav-link">Add Patient</a></li>
	        	<li class="nav-item navEffects"><a href="hospitalPortalView.php?portalFn=2" class="nav-link">Add Appointment</a></li>
	        	<li class="nav-item navEffects"><a href="hospitalPortalView.php?portalFn=3" class="nav-link">Add Surgery Details</a></li>
	        	<li class="nav-item navEffects"><a href="hospitalPortalView.php?portalFn=4" class="nav-link">Edit Hospital Details</a></li>
	        	<li class="nav-item navEffects"><a href="hospitalPortalView.php?portalFn=5" class="nav-link">Register New Patient</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <?php
        if(isset($_GET["portalFn"]))
            $func = $_GET["portalFn"] ;
          else {
            die("");
          }
        if($func==1)
        {
    ?>
    <!-- Add User -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
          <div class="form no-gutters d-flex align-items-start align-items-center">
            <form class="" action="hospitalPortalView.php?portalFn=1" method="post" enctype="multipart/form-data">
              <br/>
              <div class="heading-section">
  	            <h2 class="">Add Patient</h2>
              </div>
              <div class="form-group py-5">
                  <input class="form-control mb-4 box_style1" type="text" name="patientId1"  placeholder="Enter Patient's ID">
                  <input class="form-control btn_style1" type="submit" name="addPatient1" value="Add Patient">
              </div>
            </form>

          </div>
        </div>
        <div class="col-lg-4">
          <?php
          if (isset($_POST['addPatient1'])) {
            function validatenumber($string) {
               return preg_replace('/[^0-9]/', '', $string);
            }

            function validate($string) {
               return preg_replace('/[^A-Z@ a-z0-9+\- .]/', '', $string);
            }
            $hospitalid = $_SESSION['hosid'];
            $patientId = validatenumber($_POST['patientId1']);
            $query = "SELECT * FROM profile WHERE id = $patientId";
            $retval=mysqli_query($connect,$query);
            $row = mysqli_fetch_assoc($retval);
            if ($row['id']!="") {
              $query = "INSERT into hospatmap (phid,hospid) values ($patientId,$hospitalid)";
              $retval=mysqli_query($connect,$query);
                echo "<script>alert('Patient Registed in Hospital');</script>";
            }
            else {
              echo "<script>alert('Not Registered Patient');</script>";
            }
          }

           ?>
        </div>

      </div>
    </div>
      <!--End of Add User -->
  <?php
        }
        else if($func==2)
        {

  ?>
    <!-- Add Appointment -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
          <div class="form no-gutters d-flex align-items-start align-items-center">
            <form class="" action="hospitalPortalView.php?portalFn=2" method="post" enctype="multipart/form-data">
              <br/>
              <div class="heading-section">
                <h2 class="">New Appointment</h2>
              </div>
              <div class="form-group py-5">
                  <input class="form-control mb-4 box_style1" type="text" name="patientId" placeholder="Enter Patient's ID">
                  <input class="form-control mb-4 box_style1" type="text" name="doctorId" placeholder="Enter Doctors's ID">
                  <select class="form-control mb-4 box_style1" name="timeSch">
                    <option value="10 am To 12 pm">10 am To 12 pm</option>
                    <option value="01:30 pm to 3pm">01:30 pm to 3pm</option>
                    <option value="4 pm to 6 pm">4 pm to 6 pm</option>
                  </select>
                  <input class="form-control btn_style1" type="submit" name="addPatient" value="Done">
              </div>
            </form>
            <?php
            if (isset($_POST['addPatient'])) {
              function validatenumber($string) {
                 return preg_replace('/[^0-9]/', '', $string);
              }

              function validate($string) {
                 return preg_replace('/[^A-Z@ a-z0-9+\- .]/', '', $string);
              }
              $hospitalid = $_SESSION['hosid'];
              $patientId = validatenumber($_POST['patientId']);
              $doctorId = validatenumber($_POST['doctorId']);
              $timeSch = validate($_POST['timeSch']);
              $query = "SELECT * FROM doctor WHERE id = $doctorId";
              $retval=mysqli_query($connect,$query);
              $rows = mysqli_fetch_assoc($retval);
              if ($rows['id']!="") {
                $query = "SELECT * FROM profile WHERE id = $patientId";
                $retval=mysqli_query($connect,$query);
                $row = mysqli_fetch_assoc($retval);
                if ($row['id']!="") {
                  $query = "SELECT * FROM hospatmap WHERE phid = $patientId and hospid = $hospitalid";
                  $retval=mysqli_query($connect,$query);
                  $row = mysqli_fetch_assoc($retval);
                  if ($row['id']!="") {
                    $query = "INSERT into appointments(phid,docid,times) values($patientId,$doctorId,'$timeSch')";
                    $retval=mysqli_query($connect,$query);
                    echo "<script>alert('Appointment Registered');</script>";
                  }
                }
                else {
                  echo "<script>alert('Not Registered Patient');</script>";
                }
              }
              else {
                echo "<script>alert('Not Registered Doctor');</script>";
              }
            }
             ?>

          </div>
        </div>
        <div class="col-lg-4">
          <div class="heading-section">
            <h2 class="">Doctor's List</h2>
            <table class="cusTable">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
              </tr>
              <?php
              $id =$_SESSION['hosid'];
                $query = "SELECT * FROM doctor WHERE hospitalid = $id";
                $retval=mysqli_query($connect,$query);
                while ($row = mysqli_fetch_assoc($retval)) {
                  ?>
                  <tr>
                    <td><?php echo $row['id'];?> </td>
                    <td><?php echo $row['docname'];?></td>
                    <td><?php echo $row['specialization'];?></td>
                  </tr><?php
                }
              ?>
            </table>
          </div>
        </div>

      </div>
    </div>
    <!-- End Add Appointment -->
  <?php
        }
          else if($func==3)
          {
            ?>
            <!-- Add Surgery -->
            <div class="container">
              <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                  <div class="form no-gutters d-flex align-items-start align-items-center">
                    <form class="" action="hospitalPortalView.php" method="GET">
                      <br/>
                      <div class="heading-section">
                        <h2 class="">New Surgery </h2>
                      </div>
                      <div class="form-group py-5">
                          <input type="number" name="portalFn" value="3" style="display:none;">
                          <input class="form-control mb-4 box_style1" type="text" name="patientId" value="" placeholder="Enter Patient's ID">
                          <input class="form-control btn_style1" type="submit" name="addPatient" value="Check">
                          <?php
                                if(isset($_GET["patientId"]))
                                {
                                  //get details about surgery
                                }
                          ?>
                      </div>
                    </form>

                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="heading-section">
                    <h2 class="">Doctor's List</h2>
                    <table class="cusTable">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Specialization</th>
                      </tr>
                      <?php
                      $id =$_SESSION['hosid'];
                        $query = "SELECT * FROM doctor WHERE hospitalid = $id";
                        $retval=mysqli_query($connect,$query);
                        while ($row = mysqli_fetch_assoc($retval)) {
                          ?>
                          <tr>
                            <td><?php echo $row['id'];?> </td>
                            <td><?php echo $row['docname'];?></td>
                            <td><?php echo $row['specialization'];?></td>
                          </tr><?php
                        }
                      ?>
                    </table>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Add Surgery -->
          <?php
          }else if($func==4)
            {

           ?>


          <?php
        }else if($func==5)
          {

         ?>

         <!-- Add Appointment -->
         <div class="container ">
           <div class="row">
             <div class="col-lg-4">
             </div>
             <div class="col-lg-4 transBack">
               <div class="form no-gutters d-flex align-items-start align-items-center">
                 <form class="" action="hospitalPortalView.php?portalFn=5" method="post" enctype="multipart/form-data" style="width:100%;">
                   <br/>
                   <div class="heading-section">
                     <h2 class="">Register New Patient</h2>
                   </div>
                   <div class="form-group py-5">
                       <input class="form-control mb-4 box_style1" type="text" name="pName"  placeholder="Name">
                       <input class="form-control mb-4 box_style1" type="text" name="pAddr"  placeholder="Address">
                       <input class="form-control mb-4 box_style1" type="text" name="pPhone"  placeholder="Phone">
                       <input class="form-control mb-4 box_style1" type="date" name="pDOB"  placeholder="Date of Birth">
                       <input class="form-control mb-4 box_style1" type="test" name="allergy" value="" placeholder="Allergy">
                       <label for="#pGender"> Gender</label>
                       <select class="form-control mb-4 box_style1" name="pGender">
                         <option value='Male'>Male</option>
                         <option value='Female'>Female</option>
                         <option value='Others'>Others</option>
                       </select>
                       <label for="#pBloodGroup"> Blood Group</label>
                       <select class="form-control mb-4 box_style1" name="pBloodGroup">
                         <option value='O+ve'>O+ve</option>
                         <option value='O-ve'>O-ve</option>
                         <option value='A+ve'>A+ve</option>
                         <option value='A-ve'>A-ve</option>
                         <option value='B+ve'>B+ve</option>
                         <option value='B-ve'>B-ve</option>
                         <option value='AB+ve'>AB+ve</option>
                         <option value='AB-ve'>AB-ve</option>
                       </select>

                       <input class="form-control btn_style1" type="submit" name="regPatient" value="Done">
                   </div>
                 </form>

               </div>
             </div>
             <div class="col-lg-4">
             </div>

        <?php
      }

  ?>
    </body>
    <?php

    if (isset($_POST['regPatient'])) {
      function validatenumber($string) {
         return preg_replace('/[^0-9]/', '', $string);
      }

      function validate($string) {
         return preg_replace('/[^A-Z@ a-z0-9+\- .]/', '', $string);
      }
      $hospitalid = $_SESSION['id'];
      $pName = validate($_POST['pName']);
      $pAddr = validate($_POST['pAddr']);
      $pPhone = validatenumber($_POST['pPhone']);
      $pDOB = $_POST['pDOB'];
      $pBloodGroup=$_POST['pBloodGroup'];
      $allergy= $_POST['allergy'];
      $pGender = $_POST['pGender'];
      $query = "SELECT * FROM profile WHERE name = '$pName' and phone =$pPhone";
      $retval=mysqli_query($connect,$query);
      $row = mysqli_fetch_assoc($retval);
      if ($row['id']=="") {

          $query = "INSERT into profile(name,address,phone,dob,blood,gender,allergy) values('$pName','$pAddr',$pPhone,'$pDOB','$pBloodGroup','$pGender','$allergy')";
          $retval=mysqli_query($connect,$query);
          $query = "SELECT * FROM profile WHERE name = '$pName' and phone =$pPhone";
          $retval=mysqli_query($connect,$query);
          $row = mysqli_fetch_assoc($retval);
          $phid=$row['id'];
          $query = "INSERT into hospatmap(phid,hospid) values($phid,$hospitalid)";
          $retval=mysqli_query($connect,$query);
          echo "<script>alert('$pDOB');</script>";
      }
      else {
        echo "<script>alert('Already Registered Patient');</script>";
      }
    }

 ?>
