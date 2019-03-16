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
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=1" class="nav-link">My Schedule</a></li>
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=2" class="nav-link">Patient's History</a></li>
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=3" class="nav-link">Add Prescriptions</a></li>
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=4" class="nav-link">Add Surgery Details</a></li>
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=5" class="nav-link">Add Scan Details</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <?php
        session_start();
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
        <div class="col-lg-4" >
          <div class="form">
            <form class="" action="doctorPortalView.php" method="GET">
              <input type="number" name="portalFn" value="2" style="display:none;">
              <div class="heading-section">
                <h3 class="centered">Your Patient's Schedule</h3>
                <table class="cusTable">
                  <tr>
                    <th>Name</th>
                    <th>ID</th>
                  </tr>
                  <?php
                    if(isset($_SESSION['docid']))
                      $docId = $_SESSION['docid'];
                    else {
                      header("location:index.html");
                    }
                      $sql = "select * from appointments, profile where appointments.docid=$docId and profile.id=appointments.phid";
                      $result = mysqli_query($connect,$sql);

                      if (mysqli_num_rows($result) > 0)
                      {
                         while($pat = mysqli_fetch_assoc($result))
                         {
                            echo "<tr>";
                            echo "<td>".$pat['name']."</td>";
                            echo '<td><input type="submit" name="pId" value="'.$pat["phid"].'">  </td>';
                            echo "</tr>";
                         }
                      }

                  ?>
                  </table>
              </div>
              <?php

              ?>
            </form>

          </div>
        </div>
        <div class="col-lg-4">

        </div>

      </div>
    </div>
      <!--End of Add User -->
  <?php
        }
        else if($func==2)
        {

            if(isset($_SESSION['pId']) )
            {

              $pID = $_SESSION['pId'];

              $sql = "select name from profile where id=$pID";
              $result = mysqli_query($connect,$sql);
              if (mysqli_num_rows($result) > 0)
              {
                $pat = mysqli_fetch_assoc($result);
                $_SESSION['pName']=$pat['name'];
              }
              else {
                die();
              }




              $pName = $_SESSION['pName'];
            }
            else {
            //  die();
            }
              $sql = "select * from prevhistory where phid=$pID";
              $result = mysqli_query($connect,$sql);

  ?>
    <!-- Add Appointment -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
          <div class="form no-gutters d-flex align-items-start align-items-center">
            <form class="" action="hospitalPortalView.php" method="GET">
              <br/>
              <div class="heading-section">
                <h2 class="">History of <span class="txtBlue"> <?php echo "$pName"; ?> </span> </h2>
              </div>
                <?php
                  if(isset($_GET['pId']) )
                  {
                    $_SESSION['pId']=$_GET['pId'];
                    $pID = $_SESSION['pId'];
                  }
                    $sql = "select * from prevhistory as ph, hospital as hos, doctor doc where ph.phid=$pID and hos.id=ph.hospitalid and doc.id=ph.doctorid";
                    $result = mysqli_query($connect,$sql);

                    if (mysqli_num_rows($result) > 0)
                    {
                       while($pat = mysqli_fetch_assoc($result))
                       {
                          ?>
                          <div class="transBack block prevH">
                            <label>Dated  </label>
                          <p ><?php echo $pat['times'];?></p>
                          <label>Hospital </label>
                          <p > <?php echo $pat['name'];?></p>
                          <br/>
                            <label>Doctor  </label>
                          <p > Dr. <?php echo $pat['docname'];?></p>
                            <label>Diagnosis </label>
                          <p > <?php echo $pat['cause'];?></p>
                          <label>Prescriptions </label>
                          <p >  <?php echo $pat['medicine'];?></p>
                            <label>Description </label>
                          <p >  <?php echo $pat['description'];?></p>
                        </div>
                          <?php
                       }
                    }

                ?>

            </form>

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
                      <tr>
                        <td>Test name</td>
                        <td>Test name</td>
                        <td>Test name</td>
                      </tr>

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
                 <form class="" action="hospitalPortalView.php" method="GET" style="width:100%;">
                   <br/>
                   <div class="heading-section">
                     <h2 class="">Register New Patient</h2>
                   </div>
                   <div class="form-group py-5">
                       <input class="form-control mb-4 box_style1" type="text" name="pName" value="" placeholder="Name">
                       <input class="form-control mb-4 box_style1" type="text" name="pAddr" value="" placeholder="Address">
                       <input class="form-control mb-4 box_style1" type="text" name="pPhone" value="" placeholder="Phone">
                       <input class="form-control mb-4 box_style1" type="text" name="pDOB" value="" placeholder="Date of Birth">
                       <p for="#pGender"> Gender</p>
                       <select class="form-control mb-4 box_style1" name="pGender">
                         <option value='1'>Male</option>
                         <option value='2'>Female</option>
                         <option value='3'>Others</option>
                       </select>
                       <p for="#pBloodGroup"> Blood Group</p>
                       <select class="form-control mb-4 box_style1" name="pBloodGroup">
                         <option value='1'>O+ve</option>
                         <option value='2'>O-ve</option>
                         <option value='3'>A+ve</option>
                         <option value='4'>A-ve</option>
                         <option value='5'>B+ve</option>
                         <option value='6'>B-ve</option>
                         <option value='7'>AB+ve</option>
                         <option value='8'>AB-ve</option>
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
