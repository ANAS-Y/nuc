<?php session_start();
   if( $_SESSION["loginStatus"]!="login"){
        header('location:vchodlogin.php');
   }
elseif($_SESSION['position']!=='VC'){
           header('location:vchodlogin.php'); 
        }
$accreditationID=$_SESSION['accreditationID'];
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
     <a href="logOut.php" style="text-decoration: none; color:white;margin-left: 95%;">Log out</a>
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
        <a class="nav-link" href="vcssf.php" style="color: white;">GENERAL INFORMATION ON UNIVERSITY<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="vcssf2.php" style="color: white;">ORGANISATION, ADMINISTRATION AND CONTRO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="vcssf2.php" style="color: white;">PHILOSOPhY,OBJECTIVES AND UTILITY SERVICES<span class="sr-only">(current)</span></a>
      </li>
         <li class="nav-item active">
        <a class="nav-link" href="checkstatus1.php" style="color: white;">CHECK ACCREDITATION STATUS<span class="sr-only">(current)</span></a>
      </li>        
    </ul>
 
       </div>
</nav>
  </div>
<?php 
include_once("connection.php");
?>
<div class="container-fluid p-5">
<!-- first div start here-->
<div class="col card p-5" >
<div class="card-title">
<h5 style="text-align:center;" id="un">ACCREDITATION STATUS</h5>
</div>
<!-- first div title--> 

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    } 
   $accreditationID = input_check($_POST["accID"]); 
$sql = "SELECT* FROM programme_apply WHERE accreditationID  ='$accreditationID' AND accreditation_status = 'Approved'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){
    
    echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category p-4" id="filled-section"  style="font-size:11px;">
<div id="forms" style="background-color:#7CC68D; color: white;font-size:8px;">
</div>';
$fetch=mysqli_fetch_assoc($result);
$faculty = $fetch['faculty'];
$depatment = $fetch['department'];
$program = $fetch['programme'];
$universityID=$fetch["universityID"];
$_SESSION['accreditationID']=$accreditationID;

$sql2 = "SELECT * FROM `universityinfo_ssf` WHERE universityID  ='$universityID' ";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
while($fetch2 = mysqli_fetch_assoc($result2)){
  $University = $fetch2["universityName"];
$universityID = $fetch2["universityID"];
}
echo'<div class="row">
<!-- Third column start here-->
<div class="col p-5 card form-category" id="filled-section" style="background-color:#7CC68D; color: white;font-size:14px;">
<h2 style="Text-align:center;"><strong>Congratulations</strong></h2>
<p>The '.$program.' Programme in '.$depatment.' Department of the '.$faculty.' Faculty.<p/>
<p>'.$University.' has been fully accreditated.</p>
</div>
</div>';
   }
   
else{
$_SESSION["msg"]='This Program is not Yet Accredited, Check back Later';
 echo '
 <h4 style="text-align:center; Color:red;"> This Program is not Yet Accredited, Check back Later.</h4>
  ';
} 
            
 }
        ?>
 <div class="row p-4" style=""> 
 <div class="col" > 
 <a class="btn btn-success  " href="vcssf.php" style="float: right;">Back to Dashboard</a>
 </div>
 <div class="col">
 <a class="btn btn-success  " href="checkstatus1.php" >Recheck</a>
 </div>
 </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <?php
require ('footer.inc');
$_SESSION["msg"]='';
?>
</div>