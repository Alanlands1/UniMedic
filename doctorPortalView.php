<?php
session_start();
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">


    $(document).ready(function(){

        $('#surgeryDiv').hide();
        $('#testDiv').hide();
        $('#surgCode').click(function(){

            if($(this).prop("checked") == true){

               $('#surgeryDiv').show();
            }

            else if($(this).prop("checked") == false){
                $('#surgeryDiv').hide();

            }

        });

        $('#testCode').click(function(){

            if($(this).prop("checked") == true){

               $('#testDiv').show();
            }

            else if($(this).prop("checked") == false){
                $('#testDiv').hide();

            }

        });

    });

</script>
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
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-p="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=1" class="nav-link">My Schedule</a></li>
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=2" class="nav-link">Patient's History</a></li>
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=3" class="nav-link">Add Prescriptions</a></li>

	        	<!--<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=4" class="nav-link">Add Surgery Details</a></li>
	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=5" class="nav-link">Add Scan Details</a></li> -->
	        </ul>
          <?php
                $pNameD = "Not Selected";
                if(isset($_SESSION['pName']) && !isset($_GET['pId']) )
                {
                  $pNameD = $_SESSION['pName'];

                }
                else if (isset($_GET['pId']))
               {
                    $pID=$_GET['pId'];
                    $sql = "select name from profile where id=$pID";
                    $result = mysqli_query($connect,$sql);
                    if (mysqli_num_rows($result) > 0)
                    {
                      $pat = mysqli_fetch_assoc($result);
                      $_SESSION['pName']=$pat['name'];
                      $pNameD = $_SESSION['pName'];
                  }
                }
                echo '<p class="info_p">Current Patient <span> '.$pNameD.'</span></p>';
            ?>
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
    ?> <!-- Add User -->
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
                    if(isset($_SESSION['docid'])) //change to session
                    {
                      $docId = $_SESSION['docid'];
                      //$_SESSION['docid']=$docId; //remove this line final!
                    }
                    else {
                    //  header("location:index.html");
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
            if(isset($_SESSION['hosId'])) // *** Change to Session
            {
                $hosID=$_SESSION['hosId'];
            }
            if(isset($_GET['pId']) )
            {
              $_SESSION['pId']=$_GET['pId'];
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

            }
            if(isset( $_SESSION['pId']))
                $pID = $_SESSION['pId'];
            else {
                die("Select a patient to continue!");
            }
            $pName = $_SESSION['pName'];
              $sql = "select * from prevhistory where phid=$pID";
              $result = mysqli_query($connect,$sql);

  ?>
    <!-- Add Appointment -->
    <div class="container">
      <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-8 transBack" >
          <div class="form no-gutters d-flex align-items-start align-items-center" >
            <div class="" >
              <br/>
              <div class="heading-section">
                <h2 class="">History of <span class="txtBlue"> <?php echo "$pName"; ?> </span> </h2>
              </div>
              <script type="text/javascript">
              document.addEventListener('DOMContentLoaded', function(event) {
                    showPrescipt();
              })
                function showPrescipt() {
                   document.getElementById("prehInfoDiv").style.display= 'block';
                   document.getElementById("surgeryInfoDiv").style.display= 'none';
                   document.getElementById("tes tInfoDiv").style.display= 'none';
                }
                function showSrgry() {
                   document.getElementById("prehInfoDiv").style.display= 'none';
                   document.getElementById("surgeryInfoDiv").style.display= 'block';
                   document.getElementById("testInfoDiv").style.display= 'none';
                }
                function showTestDiv() {
                   document.getElementById("prehInfoDiv").style.display= 'none';
                   document.getElementById("surgeryInfoDiv").style.display= 'none';
                   document.getElementById("testInfoDiv").style.display= 'block';
                }

              </script>
              <div class="prevHlist">
      	        <ul class="">
      	        	<li class=""><button id ="btnPresc" class="nav-link" onclick="showPrescipt()">Prescriptions</button></li>
      	        	<li class=""><button  id ="btnSgryDet" class="nav-link" onclick="showSrgry()">Surgery  History</button></li>
      	        	<li class=""><button  id ="btnTestDet" class="nav-link" onclick="showTestDiv()">Test Results</button></li>
      	        	<!--<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=4" class="nav-link">Add Surgery Details</a></li>
      	        	<li class="nav-item navEffects"><a href="doctorPortalView.php?portalFn=5" class="nav-link">Add Scan Details</a></li> -->
      	        </ul>
              </div>

              <div class="prehDiv" id="surgeryInfoDiv">
                <?php
                    $sqlSrg = "select * from surgeryhis as surg, prevhistory as prevh where surg.histId = prevh.hisid and prevh.phid = $pID";
                    //echo $sqlSrg;
                    $resultSg = mysqli_query($connect,$sqlSrg);
                    if(mysqli_num_rows($resultSg)>0)
                    {
                        while($sgryInfo = mysqli_fetch_assoc($resultSg))
                        {
                          ?>
                          <div class="container transBack">
                            <div class="row">
                          <div class="col-lg-4">
                          <p class=""> <?php echo $sgryInfo['complication'];?></p>
                          </div>
                            <div class="col-lg-4">
                          <p class="titlePH">Dated  </p>
                          <p class=""> <?php echo $sgryInfo['dated'];?></p>
                          </div>
                          <div class="col-lg-4">
                          <p class="titlePH">Rest Till  </p>
                          <p class=""> <?php echo $sgryInfo['restperiod'];?></p>
                          </div>
                          </div>
                          </div>
                          <?php
                        }
                      ?>

                      <?php
                    }
                    else {
                      echo "<p> No surgeries for this consultation</p>";
                    }
                ?>
              </div>
              <div class="prehDiv" id="prehInfoDiv">
                <?php
                    $sql = "select * from prevhistory as ph, hospital as hos, doctor doc where ph.phid=$pID and hos.id=ph.hospitalid and doc.id=ph.doctorid";
                    $result = mysqli_query($connect,$sql);

                    if (mysqli_num_rows($result) > 0)
                    {
                       while($pat = mysqli_fetch_assoc($result))
                       {
                          ?>
                          <div class="container transBack">
                            <div class="row">
                              <div class=" prevH" style="width:100% !important;">
                                <p class="title">Dated : <span ><?php echo $pat['times'];?></span>  </p>
                            </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 ">
                                <p class="title">Hospital </p>
                                <span > <?php echo $pat['name'];?></span>
                              </div>
                              <div class="col-md-6 ">
                                <p class="title">Doctor  </p>
                              <span> Dr. <?php echo $pat['docname'];?></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12 ">
                                <label class="titlePH">Diagnosis </label>
                              <p class="wordBreak"> <?php echo $pat['cause'];?></p>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-lg-12 ">
                                <label class="titlePH">Prescriptions </label>
                              <p class="wordBreak"> <?php echo $pat['medicine'];?></p>
                              </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12 ">
                                  <label class="titlePH">Description </label>
                                <p class="wordBreak"> <?php echo $pat['description'];?></p>
                                </div>
                              </div>


                            <label class="titlePH">Surgery  </label>
                            <div class="row">


                                <?php
                                    $sqlSrg = "select * from surgeryhis where histId = ".$pat['hisid'];
                                    //echo $sqlSrg;
                                    $resultSg = mysqli_query($connect,$sqlSrg);
                                    if(mysqli_num_rows($resultSg)>0)
                                    {
                                      $sgryInfo = mysqli_fetch_assoc($resultSg);

                                      ?>
                                        <div class="col-lg-4 ">
                                        <p class="wordBreak"> <?php echo $sgryInfo['complication'];?></p>
                                        </div>
                                          <div class="col-lg-4">
                                        <p class="titlePH">Dated  </p>
                                        <p class=""> <?php echo $sgryInfo['dated'];?></p>
                                      </div>
                                      <div class="col-lg-4">
                                    <p class="titlePH">Rest Till  </p>
                                    <p class=""> <?php echo $sgryInfo['restperiod'];?></p>
                                  </div>
                                      <?php
                                    }
                                    else {
                                      echo "<p> No surgeries for this consultation</p>";
                                    }
                                ?>


                            </div>

                          <!--
                          <div class="transBack  prevH" style="width:100% !important;">
                            <p class="title">Dated : <span ><?php echo $pat['times'];?></span>  </p>
                          <label>Hospital </label>
                          <p > <?php echo $pat['name'];?></p>
                          <br/>
                            <p class="title">Doctor  </p>
                          <span > Dr. <?php echo $pat['docname'];?></span>
                            <label>Diagnosis </label>
                          <p > <?php echo $pat['cause'];?></p>
                          <label>Prescriptions </label>
                          <p >  <?php echo $pat['medicine'];?></p>
                            <label>Description </label>
                          <p >  <?php echo $pat['description'];?></p>
                        </div> -->
                        </div>
                          <?php
                       }
                    }

                ?>
              </div>
              <div class="prehDiv" id="testInfoDiv">
                <h2>Test Results</h2>
                <?php
                    $sqlTest = "select * from  labtest  where hospitalid=$hosID and psid = $pID";
                    //echo $sqlTest;
                    $resultTest = mysqli_query($connect,$sqlTest);
                    if(mysqli_num_rows($resultTest)>0)
                    {
                        while($testInfo = mysqli_fetch_assoc($resultTest))
                        {
                          ?>
                          <div class="container transBack">
                            <div class="row">
                          <div class="col-lg-4">
                          <p class=""> <?php echo $testInfo['descp'];?></p>
                          </div>
                            <div class="col-lg-4">
                          <p class="titlePH">Dated  </p>
                          <p class=""> <?php echo $testInfo['dated'];?></p>
                          </div>
                          <div class="col-lg-4">
                          <p class="titlePH">Status  </p>
                          <p class=""> <?php echo $testInfo['status'];?></p>
                          </div>
                          </div>
                          </div>
                          <?php
                        }
                      ?>

                      <?php
                    }
                    else {
                      echo "<p> No Tests done for this individual</p>";
                    }
                ?>
              </div>


          </div>
        </div>
        <div class="col-lg-2">

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
                    <form class="" action="doctorPortalView.php" method="GET">
                      <br/>
                      <div class="heading-section">
                        <h2 class="">Suggest Prescriptions </h2>
                      </div>
                      <div class="form-group py-5">
                          <input type="number" name="portalFn" value="3" style="display:none;">
                          <input class="form-control mb-4 box_style1" type="text" name="cause" value="" placeholder="Diagnosis">
                          <input class="form-control mb-4 box_style1" type="text" name="medicine" value="" placeholder="Suggest Medicines">
                          <label for="#surgId">Surgery Needed?</label>
                          <input type="checkbox" name="surgCode" id="surgCode" ><br/>
                          <label for="#testCode">Test Needed?</label>
                          <input type="checkbox" name="testCode" id="testCode"><br/>
                          <label for="#descp">Short Description if needed </label>
                          <textarea class="form-control mb-4 box_style1" name="descp"  placeholder="Description"></textarea>
                          <div class="form-group" Name="surgeryDiv" id="surgeryDiv">
                            <div class="heading-section">
                              <h2 class="">Enter Surgery Deatils </h2>
                            </div>
                              <label for="#sgDate">Surgery Date </label>
                              <input type="date" class="form-control box_style1" name="sgDate">
                              <label for="#sgComp">Enter any complications </label>
                              <input type="text" class="form-control box_style1" name="sgComp" value="" placeholder="Complications">
                              <label for="#sgRest">Rest Till</label>
                              <input type="Date" class="form-control box_style1" name="sgRest"  placeholder="Rest Required Till">
                          </div>
                          <div class="form-group" Name="testDiv" id="testDiv">
                            <div class="heading-section">
                              <h2 class="">Enter Test Deatils </h2>
                            </div>
                              <label for="#sgDate">Test Date </label>
                              <input type="date" class="form-control box_style1" name="tstDate" >
                              <label for="#tstComp">Enter Description </label>
                              <input type="text" class="form-control box_style1" name="tstComp"  placeholder="Description of Test">
                          </div>
                          <input class="form-control btn_style1" type="submit" name="addPres" value="Add">
                          <?php
                                if(isset($_SESSION["pId"]))
                                {
                                  //get details about surgery
                                  $pID=$_SESSION["pId"];
                                }
                                if(isset($_SESSION['hosId'])) // *** Change to Session
                                {
                                  $hosID=$_SESSION['hosId'];
                                }
                                if(isset($_SESSION['docid'])) // *** Change to Session
                                {
                                  $docId=$_SESSION['docid'];
                                }

                                if(isset($_GET['addPres']))
                                {
                                  $cause = $_GET['cause'];
                                  $medicin = $_GET['medicine'];
                                  $descp = $_GET['descp'];
                                  $dated = date("Y/m/d");
                                  $query = "INSERT into prevhistory(phid ,hospitalid,doctorid,cause,medicine,times,description) values($pID,$hosID,$docId,'$cause','$medicin','$dated','$descp')";
                                  $retval=mysqli_query($connect,$query);
                                  $last_presc = mysqli_insert_id($connect);
                                  if(isset($_GET['surgCode']))
                                  {
                                      $compli = $_GET['sgComp'];
                                      $restP= $_GET['sgRest'];
                                      $sgDated = $_GET['sgDate'];
                                      $query = "INSERT into surgeryhis (dated ,complication,restperiod,histId) values('$sgDated','$descp','$restP',$last_presc)";
                                      $retval=mysqli_query($connect,$query);
                                  }

                                  if(isset($_GET['testCode']))
                                  {
                                      $descp = $_GET['tstComp'];
                                      $tstDated = $_GET['tstDate'];
                                      $query = "INSERT into labtest (descp,dated,hospitalid,psid) values('$descp','$tstDated',$hosID,$pID)";
                                      echo $query;
                                      $retval=mysqli_query($connect,$query);
                                  }
                                }
                          ?>
                      </div>
                    </form>

                  </div>
                </div>
                <div class="col-lg-4">

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
