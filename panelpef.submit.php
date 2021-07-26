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
       <div>
  <p style="color: red;"><?php echo $_SESSION["msg"];?></p>
  </div>
</nav>
</div>
<?php 
$accreditationID=$_SESSION['accreditationID'];
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
  $sql = "SELECT * FROM `panelreport` WHERE ID= '$ID' AND status='submited'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

             /* Performing SQL query */
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
    
    echo '<div class="container-fluid">
<!-- first div start here-->
<div class="col card" style="height:300px">
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">YOU HAVE ALREADY SUBMITED THE ACCREDITATION REPORT</h3>
</div>

<div class="form-row">
 <div class="col alert">
<a class="btn btn-primary login-btn" href="printpanelReport.php" style="float: right; width: 100%; ">PRINT THE SUBMITED ACCREDITATION REPORT</a>
 </div>
 </div>
</div>';
  /* Closing connection */
mysqli_close($db_link);
//header('location:panelpef.submit.php');
}
else{
if($_SERVER["REQUEST_METHOD"]=="POST"){
        $Fname = input_check($_POST["vcFname"]);
       $Lname = input_check($_POST["vcLname"]);
       $Oname = input_check($_POST["vcOname"]);
       $sdate = input_check($_POST["cdate"]);
       
       
$sql = "SELECT * FROM  `academiccontent_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$academicContent=0;
while($fetch=mysqli_fetch_assoc($result)){    
$academicContent = $fetch["score"]+ $academicContent;     
} 

$sql = "SELECT * FROM  `employersrating_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$employersrating=0;
while($fetch=mysqli_fetch_assoc($result)){    
$employersrating = $fetch["score"]+ $employersrating;     
} 

$sql = "SELECT * FROM `funding_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$funding=0;
while($fetch=mysqli_fetch_assoc($result)){    
$funding = $fetch["score"]+ $funding;     
} 

$sql = "SELECT * FROM `library_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$library=0;
while($fetch=mysqli_fetch_assoc($result)){    
$library = $fetch["score"]+ $library;     
}

$sql = "SELECT * FROM `physicalfacilities_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$physicalfacilities=0;
while($fetch=mysqli_fetch_assoc($result)){    
$physicalfacilities = $fetch["score"]+ $physicalfacilities;     
}

$sql = "SELECT * FROM `staffing_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$staffing=0;
while($fetch=mysqli_fetch_assoc($result)){    
$staffing = $fetch["score"]+ $staffing;     
}

$sql = "INSERT INTO `panelreport`(`ID`, `academicContent`, `employersRating`, `funding`, `library`, `physicalFacilities`, 
`staffing`, `fName`, `lName`, `oName`, `status`, `submitedDate`, `accreditationID`) VALUES ('$ID','$academicContent','$employersrating',
'$funding','$library','$physicalfacilities','$staffing','$Fname','$Lname','$Oname','submited','$sdate','$accreditationID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$_SESSION["msg"]= "Submited Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:panelpef.submit.php');
}

?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SUBMITING THE NUC/PEF( FINAL STAGE)</h3>
</div>
  
<div class="row"  >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <div class="form-group">
    <h4 style="text-align: center; color: red;">CONFIDENTIALITY OF THE REPORT</h4>
    <label>This form is to be completed by each Accreditation Panel Member. Information contained in this report is strictly for the use of the National Universities 
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
<h5 style="text-align: center;">NAME AND DECLARATION OF THE ASSESSOR  </h5>
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
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">SUBMIT</button>
 <br />
 <br />
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<?php
	}
?>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>