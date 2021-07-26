<?php
   session_start();
   if( $_SESSION["loginStatus"]!="login"){
        header('location:panel.login.php');
   }
else{ 
    if( $_SESSION["position"]="Member" OR $_SESSION["position"]="Chairman" ){ 
    }
    else{
        header('location:panel.login.php');
    }
    
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>


 <!-- CDN CSS & JS -->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="css/w3.css" type="text/css" />
      
       <!-- User defined CSS & JS -->
       <link href="css/nuc.css" rel="stylesheet" type="text/css" />
       <script type="text/javascript" src="css/nuc.js"> </script>
      
 <title>National Universities commission</title>
  </head>
  <div class="container-fluid">
<!-- first div start here-->
  <body onload="programmeDisplay">
          
  <!-- Navigation bar start here -->
  <div class="container-fluid navdiv" >
  
   <!-- Top navbar with a marquee start here-->
     <div class="container-fluid topnav" > 
     <a href="panelLogOut.php" style="text-decoration: none; color:white;margin-left: 95%;">Log out</a>
     </div>
     
  <nav class="navbar navbar-expand-lg navbar-light">
 
  <!-- logo start here-->
    <img src="images/nuc-header-new.png" alt="logo" width="20%" />
   
  <a href="#" class="nav-link" ><i class="w3-large fa fa-home"></i></a>
  <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="panelpef.php" style="color: white;">VISITATION DETAILS<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onmouseover="showDropDown()" href="panelpef1.php"style="color: white;" >ADMISSION REQUIREMENTS </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="panelpef2.php" style="color: white;">STUDENTS COURSE EVALUATION </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="panelpef3.php" style="color: white;">ACADEMIC STAFF</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="panelpef4.php" style="color: white;">NON-TEACHING STAFF</a>
      </li>
      
             
    </ul>
 
       </div>
</nav>
<div class="col card" >
<p style="color: red;"><?php echo $_SESSION["msg"];?></p>
 
<?php 
$accreditationID = $_SESSION['accreditationID'];
$ID = $_SESSION['ID'];
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
    
include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
$sql = "SELECT * FROM `panelreport_summary` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

             /* Performing SQL query */
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
    
    echo '<div class="container-fluid">
<!-- first div start here-->
<div class="col card" style="height:300px">
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">YOU HAVE ALREADY SUBMITED THE ACCREDITATION PANEL REPORTS</h3>
</div>
<div class="form-row">
 <div class="col alert">
<a class="btn btn-primary login-btn" href="printpanelreport.php" style="float: right; width: 100%; ">PRINT THE SUBMITED ACCREDITATION PANEL REPORTS</a>
 </div>
 </div>
</div>';
//header('location:panelpef.submit.php');
exit();
}
else{       
       
$sql1 = "SELECT * FROM `panelmembers` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql1)){die("Faild  to check panel Members" . mysqli_error($db_link));}
$result1 = mysqli_query($db_link,$sql1);
$panel_members=mysqli_num_rows($result1);


$sql = "SELECT * FROM `panelreport` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$numb=mysqli_num_rows($result);


if($numb>0){
      
$academicContent=0;
$employersrating=0;
$funding=0;
$library=0;
$staffing=0;
$physicalfacilities=0;

while($fetch=mysqli_fetch_assoc($result)){    
$academicContent = $fetch["academicContent"]+ $academicContent;        
$employersrating = $fetch["employersRating"]+ $employersrating;        
$funding = $fetch["funding"]+$funding;       
$library = $fetch["library"]+ $library;      
$physicalfacilities = $fetch["physicalFacilities"]+ $physicalfacilities;        
$staffing = $fetch["staffing"]+ $staffing;  

$academicContent1 = $fetch["academicContent"];        
$employersrating1 = $fetch["employersRating"];        
$funding1 = $fetch["funding"];       
$library1 = $fetch["library"];      
$physicalfacilities1 = $fetch["physicalFacilities"];        
$staffing1 = $fetch["staffing"];     
}

$total = $academicContent + $employersrating + $funding + $library + $physicalfacilities + $staffing;
$avg1 =$total/6;
$academicContentAvg=$academicContent/$numb;
$employersratingAvg=$employersrating/$numb;
$fundingAvg=$funding/$numb;
$libraryAvg=$library/$numb;
$physicalfacilitiesAvg=$physicalfacilities/$numb;
$staffingAvg=$staffing/$numb;
$avg2 =$total/6;
$totalAvg = $academicContentAvg + $employersratingAvg + $fundingAvg + $libraryAvg + $physicalfacilitiesAvg + $staffingAvg;
}
else{
    $_SESSION["msg"]= "No Panel Report Submited Yet!";
   //header('panelpef.summary.php');
}
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($numb != $panel_members){
  $_SESSION["msg"]= "Some of the Panel Members did Not Submited their Report!";
//header('location:panelpef.summary.php');
	
?>
<script type="text/javascript">
<!--
	window,location='panelpef.summary.php';
-->
</script>
<?php

}
else{
    $Fname = input_check($_POST["vcFname"]);
       $Lname = input_check($_POST["vcLname"]);
       $Oname = input_check($_POST["vcOname"]);
       $sdate = input_check($_POST["cdate"]);
       
       $sql = "INSERT INTO `panelreport_summary`(`ID`, `academicContent`, `employersRating`, `funding`, `library`,
 `physicalFacilities`, `staffing`, `total`, `avg`, `panelresut`, `accreditation_status`, `fName`, `lName`, `oName`,
  `status`, `sdate`, `accreditationID`) VALUES ('$ID','$academicContent','$employersrating',
'$funding','$library','$physicalfacilities','$staffing','$total','$avg1','','', '$Fname','$Lname','$Oname','submited','$sdate','$accreditationID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$sql = "INSERT INTO `panelreport_summary_avg`(`ID`, `academicContent`, `employersRating`, `funding`, `library`,
 `physicalFacilities`, `staffing`, `total`, `avg`, `panelresut`, `accreditation_status`, `fName`, `lName`, `oName`,
  `status`, `submitedDate`, `accreditationID`) VALUES ('$ID','$academicContentAvg','$employersratingAvg',
'$fundingAvg','$libraryAvg','$physicalfacilitiesAvg','$staffingAvg','$totalAvg','$avg2','','', '$Fname','$Lname','$Oname','submited','$sdate','$accreditationID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$_SESSION["msg"]= "Submited Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:panelpef.summary.php');
}
}

?>

<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SUBMITING THE NUC/PEF( FINAL STAGE)</h3>
<button class="btn btn-lg alert-danger" style="margin-left: 30%;"><?php echo $_SESSION["msg"];?></button>
</div>
  <?php
   
  echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<div id="forms" style="background-color:#7CC68D; color: white;font-size:8px;">
<h6 style="text-align:center;"> PANEL MEMBERS ACCREDITATION REPORT SUMMARY</h6>

</div>
    <table class="table">
<tr class="trheader">
	<td>Academic Content</td>
	<td>Employers Rating</td>
    <td>Funding</td>
	<td>Library</td>
	<td>Physical Facilities</td>
	<td>Staffing</td>
    <td>Total</td>
    
</tr>';

    $sql = "SELECT * FROM `panelreport` WHERE accreditationID='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check panel report" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);

    while($fetch=mysqli_fetch_assoc($result)){    
$academicContent1 = $fetch["academicContent"];        
$employersrating1 = $fetch["employersRating"];        
$funding1 = $fetch["funding"];       
$library1 = $fetch["library"];      
$physicalfacilities1 = $fetch["physicalFacilities"];        
$staffing1 = $fetch["staffing"];
$total2 = $academicContent1 + $employersrating1 + $funding1 + $library1 + $physicalfacilities1 + $staffing1;
    echo '<tr class="tr">
    <td>'.$academicContent1.'</td>
	<td>'.$employersrating1.'</td>
	<td>'.$funding1.'</td>
	<td>'.$library1.'</td>
	<td>'.$physicalfacilities1.'</td>
	<td>'.$staffing1.'</td>
      <td>'.$total2.'</td>
       </tr>';
       }
       echo'
       <tr class="trheader">
	<td>TOTAL POINTS</td>
	<td></td>
    <td></td>
	<td></td>
	<td></td>
	<td></td>
    <td>OVERALL TOTAL POINTS</td>
    </tr>              
       <tr class="tr">
    <td>'.$academicContent.'</td>
	<td>'.$employersrating.'</td>
	<td>'.$funding.'</td>
	<td>'.$library.'</td>
	<td>'.$physicalfacilities.'</td>
	<td>'.$staffing.'</td>
    <td>'.$total.'</td>
       </tr>
       <tr class="tr">
         <tr class="trheader">
	<td>TOTAL PERCENTAGE</td>
	<td></td>
    <td></td>
	<td></td>
	<td></td>
	<td></td>
    <td>OVERALL PERCENTAGE</td>
    </tr> 
    <td>'.$academicContentAvg.'%</td>
	<td>'.$employersratingAvg.'%</td>
	<td>'.$fundingAvg.'%</td>
	<td>'.$libraryAvg.'%</td>
	<td>'.$physicalfacilitiesAvg.'%</td>
	<td>'.$staffingAvg.'%</td>
    <td>'.$totalAvg.'%</td>
       </tr>';
         echo'</table>';
       
      echo'
    <table class="table">
<tr class="trheader">
	<td>Name of Panel Members</td>
	<td>Email</td>
    <td>Phone Number</td>
    
</tr>';
       while($fetch1=mysqli_fetch_assoc($result1)){
   $full_name= $fetch1['firstName']." ".$fetch1['surname']." ".$fetch1['otherName'];  
    $email= $fetch1['email'];
    $phone= $fetch1['telephone1'];
    
    echo'
    <tr class="tr">
	<td>'.$full_name.'</td>
     <td>'.$email.'</td>
	<td>'.$phone.'</td>
    </tr>';
    }
      echo'</table>';

?>


 </div>

  
<div class="row"  >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <div class="form-group">
    <h4 style="text-align: center; color: red;">CONFIDENTIALITY OF THE REPORT</h4>
    <label>This form is to be Submited by the Chairman of the Accreditation Panel . Information contained in this report is strictly for the use of the National Universities 
    Commission and its authorized agents only.</label>
    
  </div>
 
  <div class="form-row">
     <label for="cdate" class="col-sm-5" >Date Form is completed </label>
     <div class="col-sm-7">
      <input type="date" class="form-control"  id="cdate" name="cdate">
    
    </div>
  </div>


</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">NAME AND DECLARATION OF THE PANEL CHAIRMAN   </h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcFame" name="vcFname" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" required="required"class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname" class="form-control" placeholder="Other name">
      </div>
  </div>
  
  <div class="form-row">
  <div class="form-row" style="margin-left:0%;">
      <div class="col"><input type="checkbox"  checked="checked" name="remember"> <label for="remeber" >I Confirmed that the Information
      provided Here are correct</label></div>
     
    </div>
</div>

</div>
 
 <div class="form-row">
 
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 85%; ">SUBMIT</button>
 <br />
 <br />
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>